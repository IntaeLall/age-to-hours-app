

## Installation

Clone the repo.

Spin up the containers for the web server by running `docker-compose up -d --build site` from the project root.

Copy the example env file to .env and amend it if needed

- `cp src/.env.example src/.env`

Once the environment has finished setting up, run the following commands from the project root:

- `docker-compose run --rm artisan migrate` 
- `docker-compose run --rm npm install`
- `docker-compose run --rm npm run dev`


The site should now be running on port 8080.