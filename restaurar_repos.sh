#!/bin/bash

BASE="$(pwd)"

if [ ! -f "repos.txt" ]; then
  echo "ERRO: repos.txt não encontrado."
  exit 1
fi

echo "Restaurando repositórios originais..."
echo

while IFS='|' read -r path url; do
  path="$(echo "$path" | tr -d '\r')"
  url="$(echo "$url" | tr -d '\r')"

  [ -z "$path" ] && continue
  [ -z "$url" ] && continue

  path="${path#./}"
  target="$BASE/$path"
  parent="$(dirname "$target")"
  backup="${target}_ARQUIVOS_BACKUP"

  echo "======================================"
  echo "Projeto: $path"
  echo "Origin: $url"

  mkdir -p "$parent"

  if [ -d "$target" ]; then
    rm -rf "$backup"
    mv "$target" "$backup"
  fi

  git clone "$url" "$target"

  if [ $? -ne 0 ]; then
    echo "ERRO: não consegui clonar $url"
    echo "Restaurando arquivos antigos..."
    rm -rf "$target"
    if [ -d "$backup" ]; then
      mv "$backup" "$target"
    fi
    continue
  fi

  if [ -d "$backup" ]; then
    find "$backup" -name ".git" -type d -prune -exec rm -rf {} +
    find "$backup" -name ".git" -type f -delete
    find "$backup" -name ".gitmodules" -type f -delete

    cp -a "$backup"/. "$target"/
    rm -rf "$backup"
  fi

  echo "OK: $path conectado ao origin original."
done < repos.txt

echo
echo "Finalizado."
