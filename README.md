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

## Launch dev server.
``` bash
git clone https://github.com/kurebio/gae-boilerplate.git
cd gae-boilerplate/app-php
composer install

# Replace kurebio-test-xxxxx to your project ID.
grep -rl 'kurebio-test-xxxxx' --exclude='./README.md' . | xargs sed -i -e "s/kurebio-test-xxxxx/your-project-id/g"

cd ..

cp inc_secret.example.yaml inc_secret.yaml
# Edit your secret variables.
vi inc_secret.yaml

# Create secret.pem.
cat xxxx-privatekey.p12 | openssl pkcs12 -nodes -nocerts -passin pass:notasecret | openssl rsa > ./secret.pem

./dev.sh
```

## Request tests.
``` bash
# default service
curl -I http://localhost:8080/
curl -I -XPOST http://localhost:8080/
# backend service (requires login)
curl -I http://localhost:8080/cron/
curl -I http://localhost:8080/admin/
# api service
curl -I http://localhost:8080/api/?key=value
```