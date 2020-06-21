USE estore;

INSERT INTO products
( id, name, price, sale_start, sale_end, sale_price )
VALUES
( 1, 'productname1', 'productprice1', NULL, NULL, NULL ),
( 2, 'productname2', 'productprice2', '2019-01-01 00:00:00', '2019-02-01 00:00:00', 'productsaleprice2' ),
( 3, 'productname3', 'productprice3', '2019-02-01 00:00:00', '2019-03-01 00:00:00', 'productsaleprice3' ),
( 4, 'productname4', 'productprice4', '2020-06-01 00:00:00', '2020-08-01 00:00:00', 'productsaleprice4' );

INSERT INTO languages
( id, code, currency, decimals, thousands )
VALUES
( 1, 'pt', 'R$', ',', '.' ),
( 2, 'en', 'US$', '.', ',' ),
( 3, 'fr', '€', '.', ',' ),
( 4, 'es', '€', '.', ',' ),
( 5, 'ru', '₽', '.', ',' );

INSERT INTO tr_varchar
( language_id, code, value )
VALUES
( 1, 'productname1', 'Skin Bomba Halloween' ),
( 1, 'productname2', 'Metal Pass 1' ),
( 1, 'productname3', 'Metal Pass 2' ),
( 1, 'productname4', 'Metal Pass 3' ),

( 2, 'productname1', 'Bomb Skin Halloween' ),
( 2, 'productname2', 'Metal Pass 1' ),
( 2, 'productname3', 'Metal Pass 2' ),
( 2, 'productname4', 'Metal Pass 3' ),

( 3, 'productname1', 'Peau de Pompe Halloween' ),
( 3, 'productname2', 'Passe Métallique 1' ),
( 3, 'productname3', 'Passe métallique 2' ),
( 3, 'productname4', 'Passe métallique 3' ),

( 4, 'productname1', 'Halloween de Piel de Bomba' ),
( 4, 'productname2', 'Pase de Metal 1' ),
( 4, 'productname3', 'Pase de Metal 2' ),
( 4, 'productname4', 'Pase de Metal 3' ),

( 5, 'productname1', 'Бомбить Кожа Хэллоуин' ),
( 5, 'productname2', 'Металл Пасс 1' ),
( 5, 'productname3', 'Металл Пасс 2' ),
( 5, 'productname4', 'Металл Пасс 3' );

INSERT INTO tr_float
( language_id, code, value )
VALUES
( 1, 'productprice1', 10 ),
( 1, 'productprice2', 50 ),
( 1, 'productprice3', 60 ),
( 1, 'productprice4', 70 ),

( 2, 'productprice1', 5.5 ),
( 2, 'productprice2', 25.5 ),
( 2, 'productprice3', 30.5 ),
( 2, 'productprice4', 35.5 ),

( 3, 'productprice1', 2.1 ),
( 3, 'productprice2', 10.1 ),
( 3, 'productprice3', 20.1 ),
( 3, 'productprice4', 30.1 ),

( 4, 'productprice1', 5 ),
( 4, 'productprice2', 25 ),
( 4, 'productprice3', 30 ),
( 4, 'productprice4', 35 ),

( 5, 'productprice1', 20 ),
( 5, 'productprice2', 100 ),
( 5, 'productprice3', 120 ),
( 5, 'productprice4', 140 ),

( 1, 'productsaleprice2', 25 ),
( 1, 'productsaleprice3', 30 ),
( 1, 'productsaleprice4', 40 ),

( 2, 'productsaleprice2', 12.75 ),
( 2, 'productsaleprice3', 15.75 ),
( 2, 'productsaleprice4', 18.75 ),

( 3, 'productsaleprice2', 5.5 ),
( 3, 'productsaleprice3', 10.5 ),
( 3, 'productsaleprice4', 14.5 ),

( 4, 'productsaleprice2', 12 ),
( 4, 'productsaleprice3', 15 ),
( 4, 'productsaleprice4', 18 ),

( 5, 'productsaleprice2', 50 ),
( 5, 'productsaleprice3', 60 ),
( 5, 'productsaleprice4', 80 );
