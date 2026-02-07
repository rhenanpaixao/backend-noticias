# Portal de Notícias - Laravel 12

> Teste portal de notícias desenvolvido com Laravel 12, incluindo telas de listagem e detalhe;

## Tecnologias Utilizadas
- **Backend**: Laravel 12 (Framework PHP)
- **Frontend**: Bootstrap 5.3 + Font Awesome 6
- **Banco de Dados**: MySQL 8.0+
- **PHP**: 8.2+
- **Composer**: 2.x



## Estrutura do Projeto

```
app/
├── Models/
│   └── Noticia.php                    # Model com atributos e relacionamentos
├── Http/Controllers/
│   └── NoticiaController.php          # Controller com index() e show()
database/
├── migrations/
│   └── 2026_02_07_210000_create_noticias_table.php
├── factories/
│   └── NoticiaFactory.php             # Factory com dados realistas
└── seeders/
    ├── NoticiaSeeder.php              # Seed de 30 notícias
    └── DatabaseSeeder.php
resources/
└── views/
    ├── layouts-app.blade.php          # Layout base com Bootstrap
    ├── noticias-index.blade.php       # Tela de listagem
    └── noticias-show.blade.php        # Tela de detalhes
routes/
└── web.php                            # Rotas do sistema
```

## Instalação e Configuração

### Pré-requisitos
Certifique-se de ter instalado:
- **PHP 8.2+** ([Download](https://www.php.net/downloads))
- **MySQL 8.0+** ou **MariaDB 10.3+** ([Download MySQL](https://dev.mysql.com/downloads/))
- **Composer 2.x** ([Download](https://getcomposer.org/download/))
- **Git** (para clonar o repositório)

### Passo 1: Clonar o Repositório
```bash
git clone https://github.com/rhenanpaixao/backend-noticias.git
cd backend-noticias
```

### Passo 2: Instalar Dependências
```bash
composer install
```

### Passo 3: Configurar Banco de Dados

#### 3.1 Criar o Banco no MySQL
Abra o MySQL e execute:
```sql
CREATE DATABASE noticias CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### 3.2 Configurar Credenciais
Copie o arquivo de exemplo e configure o `.env`:
```bash
# Windows
copy .env.example .env

# Linux/Mac
cp .env.example .env
```

Edite o arquivo `.env` e configure suas credenciais do MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=noticias
DB_USERNAME=root
DB_PASSWORD=SUA_SENHA_AQUI
```

### Passo 4: Gerar Key da Aplicação
```bash
php artisan key:generate
```

### Passo 5: Executar Migrations e Seeders
```bash
# Cria tabelas e popula com 30 notícias de exemplo
php artisan migrate:fresh --seed
```

### Passo 6: Iniciar o Servidor
```bash
php artisan serve
```

## Acessando o Sistema

Abra seu navegador e acesse: **http://localhost:8000**

Se a porta 8000 estiver ocupada, o Laravel usará outra porta (ex: 8001, 8002). Verifique a saída do comando `php artisan serve`.



## Desenvolvedor
Desenvolvido por **Rhenan Paixao** para processo seletivo.

---
**Última atualização**: 07/02/2026
