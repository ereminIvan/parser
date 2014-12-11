USE parser;

INSERT INTO _sources (title, batch_url, results_total, results_current, page_total, page_current, type)
VALUES ('afisha_eda', 'http://eda.ru/recipelist/page%s', 30988, 0, NULL, NULL, 'recipe_list');