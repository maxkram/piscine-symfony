# Navigate to the ex01 directory
mkdir -p ex01/requirement{1,2,3,4,5}
cd ex01

# Requirement 1: Version 2.3.0
echo '{
  "require": {
    "monolog/monolog": "2.3.0"
  }
}' > requirement1/composer.json
cd requirement1
composer install
cd ..

# Requirement 2: Version >2.2.0 and <=2.3.5
echo '{
  "require": {
    "monolog/monolog": ">2.2.0,<=2.3.5"
  }
}' > requirement2/composer.json
cd requirement2
composer install
cd ..

# Requirement 3: Version >=2.1.0 and <2.2.0
echo '{
  "require": {
    "monolog/monolog": ">=2.1.0,<2.2.0"
  }
}' > requirement3/composer.json
cd requirement3
composer install
cd ..

# Requirement 4: Version >=2.0.0 and <2.0.2
echo '{
  "require": {
    "monolog/monolog": ">=2.0.0,<2.0.2"
  }
}' > requirement4/composer.json
cd requirement4
composer install
cd ..

# Requirement 5: Version >2.0.0 and <2.3.5
echo '{
  "require": {
    "monolog/monolog": ">2.0.0,<2.3.5"
  }
}' > requirement5/composer.json
cd requirement5
composer install
cd ..