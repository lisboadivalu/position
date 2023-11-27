#21/11
Started At 06:50
finish At 07:40

#22/11
Started At 06:00
finish At 06:35

#23/11
Started At 06:25
finish At 07:00

#27/11
Started At 10:20
finish At 11:05

#Documentation
https://documenter.getpostman.com/view/14683797/2s9YeEcCiw


#Run project

docker-compose up -d --build
docker exec -it position_app php artisan migrate
docker exec -it position_app php artisan db:seed
docker exec -it poisition_app php artisan queue:work

#Mailhog

open on your browser http://localhost:8026
