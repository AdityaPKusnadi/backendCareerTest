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

---
#### 2. End point CRUD

### Get datanya

**URL:** `/api/users`

**Method:** `GET`

**Headers:**
```http
Authorization: Bearer ambil_dari_token_login
Accept: application/json
```


**Response:**
```json
{
    "data": [
        {
            "id": 1,
            "name": "Test User",
            "email": "test@example.com",
            "created_at": "2024-06-01T00:00:00.000000Z",
            "updated_at": "2024-06-01T00:00:00.000000Z"
        },
        {
            "id": 2,
            "name": "Budi Santoso",
            "email": "budi@example.com",
            "created_at": "2024-06-01T00:00:00.000000Z",
            "updated_at": "2024-06-01T00:00:00.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/users?page=1",
        "last": "http://127.0.0.1:8000/api/users?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/users?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/users",
        "per_page": 10,
        "to": 2,
        "total": 2
    }
}
```

#### Screenshot:
![Alt Text](screenshot/getData.png)


### Create User

**URL:** `/api/users`

**Method:** `POST`

**Headers:**
```http
Authorization: Bearer ambil_dari_token_login
Accept: application/json
```

**Request Body:**
```json
{
    "name": "Budi Santoso",
    "email": "budi@example.com",
    "password": "rahasia123"
}
```

**Response:**
```json
{
    "id": 2,
    "name": "Budi Santoso",
    "email": "budi@example.com",
    "created_at": "2024-06-01T00:00:00.000000Z",
    "updated_at": "2024-06-01T00:00:00.000000Z"
}
```

#### Screenshot:
![Alt Text](screenshot/createUser.png)

### Update User

**URL:** `/api/users/{id}`

**Method:** `PUT`

**Headers:**
```http
Authorization: Bearer ambil_dari_token_login
Accept: application/json
```

**Request Body:**
```json
{
    "name": "Budi Update",
    "email": "budi@example.com"
}
```

**Response:**
```json
{
    "id": 2,
    "name": "Budi Update",
    "email": "budi@example.com",
    "created_at": "2024-06-01T00:00:00.000000Z",
    "updated_at": "2024-06-01T00:00:00.000000Z"
}
```

#### Screenshot:
![Alt Text](screenshot/updateUser.png)

### Delete User

**URL:** `/api/users/{id}`

**Method:** `DELETE`

**Headers:**
```http
Authorization: Bearer ambil_dari_token_login
Accept: application/json
```

**Response:**
```json
{
    "message": "User berhasil dihapus."
}
```

#### Screenshot:
![Alt Text](screenshot/deleteUser.png)