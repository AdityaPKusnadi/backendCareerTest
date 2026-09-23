## Backend Career Test - Adhivasindo
### Nama : Aditya Prasetya Kusnadi

#### 1. End point Login

**URL:** `/api/login`

**Method:** `POST`

**Request Body:**
```json
{
    "email": "test@example.com",
    "password": "password"
}
```

**Response:**
```json
{
    "token": "your_auth_token",
    "user": {
        "id": 1,
        "name": "Test User",
        "email": "test@example.com",
        "created_at": "2024-06-01T00:00:00.000000Z",
        "updated_at": "2024-06-01T00:00:00.000000Z"
    }
}
```

#### Screenshot:
![Alt Text](screenshot/login.png)
