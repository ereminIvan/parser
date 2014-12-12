<?php
include_once 'vendor/autoload.php';

$conn = new Parser\Connection();
$conn->beginTransaction();
/** @var Parser\Scheduler $scheduler */
$scheduler = Parser\Scheduler::getInstance($conn);
$task = $scheduler->createTask();
print_r($scheduler); print_r($task);

try {
    $source = new Parser\Entity\Source($conn, 'afisha_eda', 'recipe_list');
    $session = new Parser\Entity\Session($conn, $source->getId());
    $schema = new Parser\Service\Schema\Afisha($source, $conn);

    $browser = new Parser\Browser();
    $html = $browser->get($schema->getParseUrl());
    $saw = new \nokogiri($html);

    $schema->parse($saw, $session);

    $session->setLastPageUrl($schema->getParseUrl());
    $session->setLastPage($schema->getLastPage());
    $session->setSourceId($source->getId());
    $session->finish();

    $source->setPageCurrent($schema->getLastPage());
    $source->setPageTotal($source->getPageTotal() + 1);
    $source->update();
} catch (Exception $e) {
    $conn->rollBack();
}
$conn->commit();
$conn = null;
$browser->close();