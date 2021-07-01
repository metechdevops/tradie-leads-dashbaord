## The hipages Technologies Stak

- **UI Quasar Framework** 
    Quasar Framework is an open-source Vue.JS based framework for building apps, with a single codebase, and deploy it on the Web as a SPA, PWA, SSR, to a Mobile App, using Cordova for iOS & Android, and to a Desktop App, using Electron for Mac, Windows,
- **Laravel Lumen Microservice FrameWork**
    Lumen is the perfect solution for building Laravel based micro-services and blazing fast APIs.
- **Laradock**
    Laradock is a full PHP development environment for Docker. It supports a variety of common services, all pre-configured to provide a ready PHP development environment.

#### App Features

- All Screen Reponsiveness
- PWA Support 
- SPA 
- SSR (Server Side Rendring) 
- Browser Extension
- Desktop Application
- Mobile App

### Notes
* All the backend and frontend dependencies pushed in this repository to minimize the build steps. 


## Getting Started

#### Step 1: Deploy the Backend Service

First you move into the project root directory and then run `$ cd docker` directory to run the dockerize backend services.

- Nginx Server
- MySQL Database Server
- PhpMyadmin Database Client
- Docker workspace container  

`~$ sudo docker-compose up -d nginx mysql phpmyadmin workspace`

* We will have the following services which running on the different ports

- PhpMyadmin running at http://localhost:8081/
    * The server is `mysql`
    * The username is `default`
    * The password is `secret` 
- Nginx running at http://localhost:801/
- MySQL running at 3307
    * The Database is `default`
    * The username is `root`
    * The password is `root` 

**Note:** `DB_HOST=192.168.112.1` your IP address will be used as DB_Host. 
You can get IP from this Route `http://localhost:801/api/v1/get-container-ip`


#### Step 2: Deploy the Frontend Service
* `~$ cd frontend` directory to run your frontend app.
* `~$ npm install` install the node modules.

* For the Frontend UI you have to run `$ quasar dev` and default running port will be 
  `http://localhost:8002`. 


**Development Build Commands**
- run development server (with default theme)
`$ quasar dev`

- on specific port
`$ quasar dev -p 9090`

- SSR
`$ quasar dev -m ssr`

- PWA
`$ quasar dev -m pwa`

- Mobile App
`$ quasar dev -m cordova -T [android|ios]`


- Electron App
`$ quasar dev -m electron`
 

#### Step 1: Unit Testing

**Laravel Lumen Unit Test**

- Bash into the docker workspace and run the following command.
`~$ sudo docker-compose exec workspace bash`

Three Unit test created which following.
- Lead listing API Test
- Accept lead API Test
- Decline lead API Test

`~$ vendor/bin/phpunit` 


**Google Chrome Lighthouse Testing** 

`~$  lighthouse http://localhost:8002/#/ --view`

-  Lighthouse Report
    - Accessibility 82
    - Best Practices 92
    - SEO 92
    - Progressive Web App
    - Performance 40

