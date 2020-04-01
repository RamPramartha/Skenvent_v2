# Skenvent_v2

Ini adalah lanjutan tugas PWPB SMKN 1 Denpasar
Untuk clone kalian bisa ketikkan

```bash
git clone https://github.com/dwiprogrammer/Skenvent_v2.git
```

## Konfigurasi

Untuk mengkonfigurasi file seperti default host, user, password
dan nama database bisa buka file

```bash
.env
```

## Update Database

Untuk update dengan database terbaru kalian bisa import langsung
file sql yang ada di repo ini, atau ketik di CLI kalian

```bash
php sys db --refresh ( nama file database tanpa menggunakan ekstensi )
```

Contoh :

```bash
php sys db --refresh db_skenvent_v2
```
