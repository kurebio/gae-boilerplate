#!/bin/bash

# The private key is for authentication from dev server.
# If you don't use authentication, delete the --appidentity_email_address and --appidentity_ priv_key_path arguments.
dev_appserver.py app.yaml app-backend.yaml app-go/ app-python/ dispatch.yaml --php_remote_debugging=yes --appidentity_email_address kurebio-test-xxxxx@appspot.gserviceaccount.com --appidentity_private_key_path ./secret.pem
