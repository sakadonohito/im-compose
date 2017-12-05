# INTER-Mediator for docker-compose sample

Author: sakadonohito

Includes

- ~~data-container~~
- MySQL(5.7)
- PostgreSQL(9.6)
- Apache/php7.1.12

## 準備
1. ```php-apach/html/```に移動し ```git clone https://github.com/sakadonohito/im-compose.git```
2. **docker-compose.yml**内のDBのrootユーザーのパスワードを変更する
3. 必要に応じてサンプルデータを変更する
    - ```mysql/init/sample_schema_mysql.sql```
    - ```postgres/init/sample_schema_pgsql.sql```
4. INTER-Mediatorの**params.php**を以下のように変更する

```php
//以下3行を追加 ※PostgreSQLを使わないならMySQLの分だけで良い
$mysql_host = getenv('MYSQL_HOST');
$pgsql_host = getenv('POSTGRES_HOST');
$dbDSN_PGSQL = "pgsql:host={$pgsql_host};port=5432;dbname=test_db";
//使いたいinclude_PostgreSQL.phpでdsnの指定を$dbDSN_PGSQLに変更する

/*
 $dbDSN = 'mysql:unix_socket=/tmp/mysql.sock;dbname=test_db;charset=utf8';
 の行を以下のように変更 ※変数展開されるようダブルクォーテーションを使うこと
 */
$dbDSN = "mysql:host={$mysql_host};dbname=test_db;charset=utf8";
```

## Usage

### 開始
```
docker-compose up -d
```

### 破棄
```
docker-compose down -v
```

## 補足

### データコンテナを使いたい場合

データコンテナを使いたい場合はそのように変更してください。
データコンテナの特定領域をDBコンテナのデータ領域にマウントすれば良いと思います。

### MySQL

- 元イメージ：debian jessie
- version: 5.7.?
- rootユーザーのパスワードはdocker-composeで変数で渡しています。[docker参照元](https://hub.docker.com/_/mysql/)
- 設定を追加変更したい場合はconfディレクトリ内の設定を追加変更等行ってください。

#### サンプルデータについて
*mysql/init*ディレクトリ内に INTER-Mediatorのdist-docs にあるsample_schema_mysql.txtを元にしたsample_schema_mysql.sqlをgitにあえて含めています。

必要に応じて内容を変更するか、最新のものに取り替えてください。

### PostgreSQL

- 元イメージ：alpine
- version: 9.6.6
- postgresユーザーのパスワードはdocker-composeで変数で渡しています。[docker参照元](https://hub.docker.com/_/postgres/)

#### サンプルデータについて
*postgres/init*ディレクトリ内に INTER-Mediatorのdist-docs にあるsample_schema_pgsql.txtを元にしたsample_schema_pgsql.sqlをgitにあえて含めています。

必要に応じて内容を変更するか、最新のものに取り替えてください。


### Apache/PHP7.1.12

- 元イメージ：debian jessie
- php version: 7.1.12
- timezone: Asia/Tokyo
- pdo_mysql
- pdo_pgsql

#### 補足
INTER-Mediatorディレクトリをwebのrootとしてマウントしています。

pdo_mysqlなど拡張の追加が必要だったため、officialのイメージそのままではなく、追加処理をしたイメージを使用しています。
※リポジトリに含まれているDockerfileでビルドしたイメージを使っています。

docker-composeで作成したコンテナがネットワーク上の名前を解決する仕組みをつかているため、params.phpの編集が必須になります。

MySQLやPostgreSQLへの接続(DSN)でのhostの指定は、コンテナの名前を指定すれば通信できます。そのようにparams.phpもしくは、接続設定を書くファイルを編集してください。
