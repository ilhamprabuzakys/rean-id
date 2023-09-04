#!/bin/bash

# Lokasi direktori proyek di lokal
LOCAL_DIR="/mnt/data/applications/web/2023/laravel-app/rean-id"

# Lokasi direktori di server
REMOTE_DIR="/home/rean/rean-new/"

# Alamat SSH server
SSH_USER="rean"
SSH_HOST="alamat_ip_server"

# Dapatkan daftar file yang diubah antara HEAD dan commit sebelumnya
CHANGED_FILES=$(git diff --name-only HEAD^ HEAD)

# Transfer file yang diubah dengan rsync
for file in $CHANGED_FILES; do
    rsync -avz --progress "$LOCAL_DIR/$file" "$SSH_USER@$SSH_HOST:$REMOTE_DIR$file"
done
