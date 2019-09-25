#!/bin/bash
# Run scheduler
while [ true ]
do
  php /var/www/hasher/artisan schedule:run
  sleep 60
done