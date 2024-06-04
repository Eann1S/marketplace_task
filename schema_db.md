## Документоориентированная база данных (MongoDB):
### Product service:

Коллекция Products:
{
  "_id": "ObjectId",
  "subcategory_id": "string",
  "name": "string",
  "image": "string",
  "price": {
    "city_id_1": "number",
    "city_id_2": "number"
  },
  "inventory": {
    "warehouse_id_1": "number",
    "warehouse_id_2": "number"
  },
  "additional_fields": {
    "field1": "value1",
    "field2": "value2"
  }
}

Коллекция Warehouses:
{
  "_id": "ObjectId",
  “city_id”: “number”
}

Коллекция Subcategories:
{
  "_id": "ObjectId",
  "category_id": "string",
  "name": "string",
  "image": "string"
}

Коллекция Categories:
{
  "_id": "ObjectId",
  "group_id": "string",
  "name": "string",
  "image": "string"
}

Коллекция Groups:
{
  "_id": "ObjectId",
  "name": "string",
  "image": "string"
}

## Реляционная база данных (PostgreSQL)
### User service:

Таблица Users:
(
  id SERIAL PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  name VARCHAR(255),
  city_id INT,
  registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Таблица Cities:
(
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

### Order service:
Таблица Orders:
(
  id SERIAL PRIMARY KEY,
  user_id INT REFERENCES Users(id),
  total_price DECIMAL(10, 2),
  status VARCHAR(50),
  creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Таблица OrderItems:
(
  id SERIAL PRIMARY KEY,
  order_id INT REFERENCES Orders(id),
  product_id VARCHAR(255),
  quantity INT
);

Таблица CartItems:
(
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES Users(id),
    product_id VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Такое разделение позволяет использовать сильные стороны каждой базы данных. MongoDB предоставляет гибкость в работе с товарами, где данные могут сильно варьироваться. PostgreSQL обеспечивает целостность и надежность данных для пользователей и заказов, где важны транзакции и строгие связи.

*Плюсы*:
-	Гибкость структуры данных товаров: MongoDB позволяет легко хранить и изменять структуру данных с различными полями для разных типов товаров.
-	Четкое разделение обязанностей: Реляционная база данных (PostgreSQL) будет использоваться для строгих структурированных данных, таких как пользователи и заказы, где важны транзакции и целостность данных.

*Минусы*:
-	Сложность интеграции: Необходимо управлять связями между данными, хранящимися в разных типах баз данных, что может усложнить разработку и поддержку.
-	Повышенные затраты на администрирование: Требуется поддержка и настройка двух различных систем баз данных.

Для хранения и управления медиаконтентом буду использовать облачное хранилище с CDN например, Amazon S3 и Amazon CloudFront, что обеспечивает масштабируемость, надежность и быструю доставку медиаконтента пользователям.
