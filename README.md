# Overview
This repository is a thing to build php environment with Docker.

# How to use
All usage of `docker-compose` command is wirte on [Compose command-line reference](https://docs.docker.com/compose/reference/) on Docker docs.  
Here is explain command using well.

## Installing
```
docker-compose up -d
```
The `-d` option is detached mode.  
When you use `-d` option execute Docker on background.  
If you want to see moving Docker log , don't use `-d` option.

Note that you may be not able to execute php script for the first time when composer not finished install, because `docker-compose up -d` command not check to finished composer install.  
You can to know progress of composer install, if execute `docker-compose logs -f composer`.


## Removing
```
docker-compose down -v
```
Note that `-v` option remove volumes.  
If you use `-v` option, remove volume of mysql,redis created by Docker.


## Installing & Updating Composer
You can use `docker-compose run`.

```
docker-compose run composer install
```

```
docker-compose run composer update
```


## Watching logs
```
docker-compose logs -f composer
```
If you want to see other services, change service name.

e.g `docker-compose logs -f nginx`

You can to know kind of services, if see the `docker-compose.yml`.


# Note
- I cannot warranty behavior of environment on this repository.
  therefore *****I DON'T HAVE RESPONSIBILITY**, when you use on production environment. :P
