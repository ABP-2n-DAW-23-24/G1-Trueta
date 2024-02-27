#!/bin/bash

# Function to execute a MySQL statement in a container
executeMySQLStatement() {
  local container_name=$1
  local mysql_statement=$2
  docker exec -i $container_name sh -c "echo \"$mysql_statement\" | mysql -u root"
}

# Function to check if migrations failed
checkMigrationStatus() {
  local migration_output=$1
  if [[ $migration_output == *"FAIL"* ]]; then
    echo "[ ERROR ] Error en les migracions."
    exit 1
  else
    echo "[ OK ] Migracions completades amb èxit."
  fi
}

# Find the MySQL container name
MYSQL_CONTAINER_NAME=$(docker ps --filter "ancestor=mysql/mysql-server:8.0" --format "{{.Names}}")

if [ -z "$MYSQL_CONTAINER_NAME" ]; then
  echo "[ ERROR ] No s'ha trobat el contenidor MySQL."
  exit 1
fi

# Create the database using the MySQL container
echo "[ INFO ] Eliminant la base de dades antiga..."
executeMySQLStatement "$MYSQL_CONTAINER_NAME" "DROP DATABASE IF EXISTS trueta;"
echo "[ OK ] Base de dades eliminada."

echo "[ INFO ] Creant la base de dades..."
executeMySQLStatement "$MYSQL_CONTAINER_NAME" "CREATE DATABASE trueta;"
echo "[ OK ] Base de dades creada."

echo "[ INFO ] Executant les migracions..."
migration_output=$(./vendor/bin/sail artisan migrate:refresh)
echo "$migration_output"  # Mostrar el output completo de las migraciones
checkMigrationStatus "$migration_output"

echo "[ INFO ] Executant els seeders..."
echo "[ INFO ] Seeding Medications...";
./vendor/bin/sail artisan db:seed --class=MedicationsTableSeeder
echo "[ INFO ] Seeding Criterias...";
./vendor/bin/sail artisan db:seed --class=CriteriasTableSeeder
echo "[ INFO ] Seeding Conditions...";
./vendor/bin/sail artisan db:seed --class=ConditionsTableSeeder
echo "[ INFO ] Seeding Doses...";
./vendor/bin/sail artisan db:seed --class=DosesTableSeeder
echo "[ INFO ] Seeding ConditionsDoses...";
./vendor/bin/sail artisan db:seed --class=ConditionsDosesTableSeeder
echo "[ INFO ] Seeding Users...";
./vendor/bin/sail artisan db:seed --class=UsersTableSeeder