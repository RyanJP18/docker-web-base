- [About](#about)
- [First Time Setup](#first-time-setup)
  - [Running the Docker Containers](#running-the-docker-containers)
  - [Setting up and Seeding the Backend](#setting-up-and-seeding-the-backend)
  - [Fixing Potential Storage Permissions Issues](#fixing-potential-storage-permissions-issues)
  - [Recommended Customisations and Improvements](#recommended-customisations-and-improvements)
  - [Useful Links](#useful-links)
- [Deployment](#deployment)
  - [Generate SSL Certificates](#generate-ssl-certificates)

# About
This is a base for automatically setting up a Docker / TypeScript / Vue / PHP / Laravel stack. It will produce `frontend`, `backend`, `database` and `database-viewer` containers, all within the same docker network, and with communication between them set up in a fairly default state.

# First Time Setup
It is recommended that prior to making any significant changes, you complete these steps to run the app and test it works:
1) Install the `docker` and `docker-compose` packages if you do not already have them
2) Run the containers (see below)
3) Log in to database and create the `RENAME` database (see below) 
4) Set up and seed the backend (see below)
5) Open `http://localhost/` in the browser and check it works

## Running the Docker Containers
1) Open a terminal and run `cd path/to/docker-web-base`
2) Run `systemctl start docker`
3) Run `docker-compose up`

## Setting up and Seeding the Backend
1) Ensure the Docker containers are running first
2) In a terminal, run `cd backend`
3) Run `bash container`
4) Run `composer install` 
5) Run `php -d memory_limit=-1 artisan migrate:fresh --seed`

## Fixing Potential Storage Permissions Issues
If you receive a permissions error, try the following:
1) Ensure the Docker containers are running first
2) In a terminal, run `cd backend` 
3) Run `bash container`
4) Run `chown -R devuser:www-data ./storage && chmod -R 775 ./storage`

## Recommended Customisations and Improvements
- Find and replace all references to `RENAME` with desired app name (note: you will need to create and seed the database again with the new name)
- Rename the `docker-web-base` solution itself
- Replace and reskin the frontend as required (see `frontend/App.vue` for a starting point)
- Replace and implement backend handling as required (see `backend/api.php` for a starting point)
- Set up linting and testing (may add this by default to docker-web-base in the future)

## Useful Links
- Frontend address: `http://localhost`
- Backend API address: `http://localhost:8000/api/`
- Database login: `http://localhost:8080`
- See the `backend/.env` file for database login details

# Deployment
Basic production configuration files are included when the tool is ready to be deployed. For a basic setup:
1) Purchase a domain from a domain registrar (e.g. `https://gandi.net`) and set up with a web hosting provider (e.g. `https://digitalocean.com`)
2) Follow steps provided by your web hosting provider to set up a virtual machine and update DNS records from your domain registrar
3) Access the server (i.e. virtual machine) you purchased from your web hosting provider
4) Copy your repo to the server machine (e.g. via `git clone`)
5) Rename `Dockerfile` to `Dockerfile-DEVELOPMENT` 
6) Rename `Dockerfile-PRODUCTION` to `Dockerfile`
7) Perform the instructions from "First Time Setup"
8) Generate SSL certificates (see below)

## Generate SSL Certificates
1) On the web server, install `certbot` if not already installed (e.g. `sudo apt install certbot`)  
2) Find and replace all references to `WEBSITE.URL` and replace all with your purchased domain name (e.g. `appname.com` [note: do not include `www.`, `http://` or `https://`])
3) Run `sudo certbot certonly --manual --preferred-challenges dns -d WEBSITE.URL` (replace WEBSITE.URL with the domain name used in step 2)
4) In your web hosting provider's DNS records, add or edit an `_acme-challenge` with the value that appeared in the console after step 3
5) In the console, a link will have been provided to `https://toolbox.google.com`, follow these instructions to test that step 4 was successful
6) Once successful, run `cp /etc/letsencrypt/live/CERTIFICATE_SAVE_LOCATION_SEE_CONSOLE/* frontend/nginx/ssl/`
7) Run `docker-compose up --build frontend`
Note: This will manually produce certificates that will need to be updated at 3-6 month intervals, for an automatic renewal look at setting up a cron job. These manual renewals these steps should be the same each time.










