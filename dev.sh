#!/bin/bash

# The private key is for authentication from dev server.
dev_appserver.py app.yaml app-backend.yaml app-go/ --php_remote_debugging=yes --appidentity_email_address kurebio-test-xxxxx@appspot.gserviceaccount.com --appidentity_private_key_path ./secret.pem
