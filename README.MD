## How to start project

- First of all you need to install [Docker](https://docs.docker.com/install/)
- You must have **php** (any version) installed on your machine
- Clone this repository
- Run `chmod 755 ./server-migrate.sh ./server-start.sh ./front-start.sh` in the root of the project
- Run `./server-start.sh` in the root of the project
- Run `./server-migrate.sh` in the root of the project in another terminal window **"only after previous command is finished"**
- Run `./front-start.sh` in the root of the project
- Open `http://localhost:3000` in your browser and sign up as a new user
- Backend is available on `http://localhost:7140`

## How to add new news source
- Run `./vendor/bin/sail artisan make:source <source_name>` in the **server** folder of the project
- You will see a new files in:
- - `app/Services/Sources/<source_name>`
- - `app/Services/Formatters/<source_name>`
- - `app/Services/Categories/<source_name>`
- Add your source configuration to the `config/news.php` file, you can see an example of the source config there

## Notes
 
- I have followed SOLID principles and used design patterns
- I have added 4 news sources API:
- - [Newsapi.org](https://newsapi.org)
- - [Gnews.io](https://gnews.io)
- - [Newsdata.io](https://newsdata.io)
- - [The Guardian](https://www.theguardian.com)

