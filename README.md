<h1>Days</h1>
21/11:<br>
Started At 06:50 | finish At 07:40<br><br>

22/11<br>
Started At 06:00 | finish At 06:35<br><br>

23/11<br>
Started At 06:25  | finish At 07:00<br><br>

27/11<br>
Started At 10:20 | finish At 11:05<br><br>

<h1>Documentation</h1>
https://documenter.getpostman.com/view/14683797/2s9YeEcCiw<br><br><br>


<h1>Run project</h1>

docker-compose up -d --build
docker exec -it position_app php artisan migrate<br>
docker exec -it position_app php artisan db:seed<br>
docker exec -it poisition_app php artisan queue:work<br><br><br>

<h1>Mailhog</h1>

open on your browser http://localhost:8026
