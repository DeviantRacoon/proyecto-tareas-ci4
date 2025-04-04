# 📝 Proyecto CRUD de Tareas con CodeIgniter 4

Este es un proyecto base en **CodeIgniter 4** que implementa un sistema de gestión de tareas (CRUD) utilizando buenas prácticas, componentes reutilizables, filtros, paginación, vistas con Bootstrap 5 y soporte para Docker.

---

## 🚀 Requisitos

- PHP >= 8.1
- Composer
- MySQL o MariaDB
- Opcional: Docker + Docker Compose

---

## 📦 Instalación Rápida

```bash
# Clona el repositorio
git clone https://github.com/DeviantRacoon/proyecto-tareas-ci4
cd proyecto-tareas-ci4

# Instala dependencias
composer install

# Copia el archivo de entorno
cp .env.EXAMPLE .env

# Configura la base de datos en el archivo .env

# database.default.hostname = 127.0.0.1
# database.default.database = ci4db
# database.default.username = ci4user
# database.default.password = secret
# database.default.DBDriver = MySQLi
# database.default.port = 3306

# Ejecuta las migraciones y los seeders
php spark migrate
php spark db:seed TaskSeeder

# Inicia el servidor de desarrollo
php spark serve
```

Accede a tu proyecto en: [http://localhost:8080](http://localhost:8080)

---

## 🐳 Uso con Docker (opcional)

Si quieres levantar una base de datos con Docker/MariaDB, asegúrate de tener Docker y Docker Compose instalados:

```bash
# Levanta el contenedor
docker compose up -d
```

Y en tu archivo `.env`, asegúrate de que coincidan:
```dotenv
database.default.hostname = 127.0.0.1
database.default.database = ci4db
database.default.username = ci4user
database.default.password = secret
database.default.DBDriver = MySQLi
database.default.port = 3306
```

---

## 🧪 Features Incluidas

- CRUD completo de tareas
- Validaciones en modelo y vista
- Componentes de tabla reutilizables
- Acciones con confirmación
- Paginación responsiva y filtros por URL
- Notificaciones con Toast
- Bootstrap 5 como sistema visual
- Seeders con datos de prueba (45 tareas)

---

## 📁 Estructura sugerida

- `app/Models/TaskModel.php`
- `app/Controllers/TaskController.php`
- `app/Views/task/*.php`
- `app/Views/components/*.php`

---

## 🛠 Comandos últiles

```bash
# Ejecutar servidor
php spark serve

# Ejecutar migraciones
php spark migrate

# Resetear DB y resembrar
php spark migrate:refresh --seed
```

---

## 🤝 Autor

Desarrollado por JESUS HECTOR ZAVALA INZUNZA.

Licencia MIT.