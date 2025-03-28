# Hot Takes API

This is the API for managing sauces and user authentication.

## Authentication Routes

### Signup

```bash
curl -X POST http://127.0.0.1:8000/api/auth/signup \
-H "Content-Type: application/json" \
-d '{"email": "test@example.com", "password": "password123"}'
```

### Login

```bash
curl -X POST http://127.0.0.1:8000/api/auth/login \
-H "Content-Type: application/json" \
-d '{"email": "test@example.com", "password": "password123"}'
```

## Sauce Routes

### Get All Sauces

```bash
curl -X GET http://127.0.0.1:8000/api/sauces \
-H "Authorization: Bearer loginToken"
```

### Get Sauce by ID

```bash
curl -X GET http://127.0.0.1:8000/api/sauces/{id} \
-H "Authorization: Bearer loginToken"
```

### Create Sauce

```bash
curl -X POST http://127.0.0.1:8000/api/sauces \
-H "Content-Type: application/json" \
-H "Authorization: Bearer loginToken" \
-d '{
    "userId": "1",
    "name": "Simple Sauce",
    "manufacturer": "Sauce Co.",
    "description": "A simple sauce without an image.",
    "mainPepper": "Jalapeno",
    "heat": 5
}'
```

### Update Sauce

```bash
curl -X PUT http://127.0.0.1:8000/api/sauces/{id} \
-H "Content-Type: application/json" \
-H "Authorization: Bearer loginToken" \
-d '{
    "userId": "1",
    "name": "Simple Sauce",
    "manufacturer": "Sauce Co.",
    "description": "A simple sauce without an image.",
    "mainPepper": "Jalapeno",
    "heat": 5
}'
```

### Delete Sauce

```bash
curl -X DELETE http://127.0.0.1:8000/api/sauces/{id} \
-H "Authorization: Bearer loginToken"
```

## Like Sauce

```bash
curl -X POST http://127.0.0.1:8000/api/sauces/{id}/like \
-H "Content-Type: application/json" \
-H "Authorization: Bearer loginToken" \
-d '{
    "like": 1
}'
```

## Dislike Sauce

```bash
curl -X POST http://127.0.0.1:8000/api/sauces/{id}/like \
-H "Content-Type: application/json" \
-H "Authorization: Bearer loginToken" \
-d '{
    "like": -1
}'
```