# The boilerplate for GAE with microservices.

```
service
- default
  - PHP55
- backend
  - PHP55
    cron
- front
  - Go1.8
    api
cron.yaml
dispatch.yaml
dos.yaml
```

```
# Launch dev server.
git clone https://github.com/kurebio/gae-boilerplate.git
cd gae-boilerplate/app-php
composer install
# Replace kurebio-test-xxxxx to your project ID.
cd ..
./dev.sh
```

```
# Request tests.
# default service
curl -I http://localhost:8080/
curl -I -XPOST http://localhost:8080/
# backend service (requires login)
curl -I http://localhost:8080/cron/
curl -I http://localhost:8080/admin/
# api service
curl -I http://localhost:8080/api/?key=value
```