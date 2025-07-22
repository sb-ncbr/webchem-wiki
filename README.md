# WebChemistry Wiki Setup

## Prequisities
Assume you have a dump of the database (MediaWiki 1.44) and the images in the `backup` directory:

```bash
ls backup
full.sql images/
```

## Setting up the wiki

First, create file with secrets using the following command:

```bash
cat > .env <<EOF
DB_TYPE=mysql
DB_NAME=mediawiki
DB_USER=wikiuser
DB_PASSWORD=$(openssl rand -hex 16)
DB_ROOT_PASSWORD=$(openssl rand -hex 16)
SERVER=http://localhost
PORT=8080
EOF
```

Then adjust `SERVER` and `PORT` variables according to your needs.

Next, fire up the containers:

```bash
podman compose up -d
```

Now, import the database contents (might need to wait a while until the mariadb initialises"

```bash
podman exec -i --env-file .env mw-db sh -c 'exec mariadb -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME"' < backup/db-2025-07-21.sql
```

And finally, copy the images:

```bash
podman cp backup/images/. mw-app:/var/www/html/images/
```


