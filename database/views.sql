USE estore;

CREATE OR REPLACE VIEW vi_products_pt AS
 	SELECT
		p.id,
		tn.value AS name,
		tp.value AS price,
		p.sale_start,
		p.sale_end,
		tsp.value AS sale_price
	FROM
		products AS p
	JOIN
		tr_varchar AS tn ON p.name = tn.code AND tn.language_id = 1
	JOIN
		tr_float AS tp ON p.price = tp.code AND tp.language_id = 1
	LEFT JOIN
		tr_float AS tsp ON p.sale_price = tsp.code AND tsp.language_id = 1
	ORDER BY
		p.id
;

CREATE OR REPLACE VIEW vi_products_en AS
 	SELECT
		p.id,
		tn.value AS name,
		tp.value AS price,
		p.sale_start,
		p.sale_end,
		tsp.value AS sale_price
	FROM
		products AS p
	JOIN
		tr_varchar AS tn ON p.name = tn.code AND tn.language_id = 2
	JOIN
		tr_float AS tp ON p.price = tp.code AND tp.language_id = 2
	LEFT JOIN
		tr_float AS tsp ON p.sale_price = tsp.code AND tsp.language_id = 2
	ORDER BY
		p.id
;

CREATE OR REPLACE VIEW vi_products_fr AS
 	SELECT
		p.id,
		tn.value AS name,
		tp.value AS price,
		p.sale_start,
		p.sale_end,
		tsp.value AS sale_price
	FROM
		products AS p
	JOIN
		tr_varchar AS tn ON p.name = tn.code AND tn.language_id = 3
	JOIN
		tr_float AS tp ON p.price = tp.code AND tp.language_id = 3
	LEFT JOIN
		tr_float AS tsp ON p.sale_price = tsp.code AND tsp.language_id = 3
	ORDER BY
		p.id
;

CREATE OR REPLACE VIEW vi_products_es AS
 	SELECT
		p.id,
		tn.value AS name,
		tp.value AS price,
		p.sale_start,
		p.sale_end,
		tsp.value AS sale_price
	FROM
		products AS p
	JOIN
		tr_varchar AS tn ON p.name = tn.code AND tn.language_id = 4
	JOIN
		tr_float AS tp ON p.price = tp.code AND tp.language_id = 4
	LEFT JOIN
		tr_float AS tsp ON p.sale_price = tsp.code AND tsp.language_id = 4
	ORDER BY
		p.id
;

CREATE OR REPLACE VIEW vi_products_ru AS
 	SELECT
		p.id,
		tn.value AS name,
		tp.value AS price,
		p.sale_start,
		p.sale_end,
		tsp.value AS sale_price
	FROM
		products AS p
	JOIN
		tr_varchar AS tn ON p.name = tn.code AND tn.language_id = 5
	JOIN
		tr_float AS tp ON p.price = tp.code AND tp.language_id = 5
	LEFT JOIN
		tr_float AS tsp ON p.sale_price = tsp.code AND tsp.language_id = 5
	ORDER BY
		p.id
;
