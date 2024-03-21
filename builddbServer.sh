#!/bin/bash
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
# Create the database using the MySQL container
echo "[ INFO ] Eliminant la base de dades antiga..."
mysql -u aescribano -paescribano -e 'DROP DATABASE IF EXISTS trueta;'
echo "[ OK ] Base de dades eliminada."

echo "[ INFO ] Creant la base de dades..."
mysql -u aescribano -paescribano -e 'CREATE DATABASE trueta;'
echo "[ OK ] Base de dades creada."

echo "[ INFO ] Executant les migracions..."
migration_output=$(php artisan migrate:refresh)
echo "$migration_output"  # Mostrar el output completo de las migraciones
checkMigrationStatus "$migration_output"

echo "[ INFO ] Executant els seeders...";
echo "[ INFO ] Seeding Medications...";
php artisan db:seed --class=MedicationsTableSeeder
echo "[ INFO ] Seeding Criterias...";
php artisan db:seed --class=CriteriasTableSeeder
echo "[ INFO ] Seeding Conditions...";
php artisan db:seed --class=ConditionsTableSeeder
echo "[ INFO ] Seeding Doses...";
php artisan db:seed --class=DosesTableSeeder
echo "[ INFO ] Seeding ConditionsDoses...";
php artisan db:seed --class=ConditionsDosesTableSeeder
echo "[ INFO ] Seeding Surgeries...";
php artisan db:seed --class=SurgeriesTableSeeder
echo "[ INFO ] Seeding Operations...";
php artisan db:seed --class=OperationsTableSeeder
echo "[ INFO ] Seeding Users...";
php artisan db:seed --class=UsersTableSeeder
echo "[ INFO ] Seeding ExtraDetails...";
php artisan db:seed --class=ExtraDetailsTableSeeder
echo "[ INFO ] Seeding Questions...";
php artisan db:seed --class=QuestionsTableSeeder
echo "[ INFO ] Seeding Resumes...";
php artisan db:seed --class=ResumesTableSeeder