# Event Management
Event Management is an API developed in Laravel designed to manage events. This tool allows producers to publish their events and customers to purchase their tickets.

## System Requeriments
This application is running on Docker containers. Therefore, ensure that you have Docker and Docker Compose installed

## Running the project
1. Clone the GitHub repository to your computer:
```
git clone https://github.com/Havallon/eventManagement.git
cd eventManagement
```
2. On `src` folder, copy the `.env.example` as `.env`.
2.1 Ensure that the database credentials in the Laravel `.env` file match those in `./.docker/db/.env`.
2. Run the containers:
```
docker compose up -d
```
3. Once the services are running, open the bash from API container. For instance:
```
docker exec -it desafio-api-1 bash
```
4. Grant executable permission to the shell script `run.sh`, then run it:
```
chmod +x run.sh
```
```
./run.sh
```