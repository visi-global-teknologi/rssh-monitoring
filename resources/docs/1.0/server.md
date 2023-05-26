# Server

---

- [Server](#server)
  - [Requirement](#requirement)
  - [Installation](#installation)

<a name="section-1"></a>
## Requirement

1. ubuntu server os with a minimum version of 20.xx

2. install the python programming language with the latest version

3. installed pip with latest version

4. python libraries installed
   - pytz
   - SQLAlchemy
   - python-dotenv

5. installed git

<a name="section-2"></a>
## Installation

go into the directory you want, example /home/user

```bash
cd /home/user
```

clone repository source code https://github.com/visi-global-teknologi/small-tools-reverse-ssh.git

```bash
git clone https://github.com/visi-global-teknologi/small-tools-reverse-ssh.git
```

go to project directory

```bash
cd small-tools-reverse-ssh
```

create file .env on linux-server directory

```bash
cd /python/linux-server
touch .env
nano .env
```

fill in the .env file with this

```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
PID_SERVER_TERMINATED_CONNECTION_STATUS="pid server terminated"
REQUEST_TERMINATE_CONNECTION_STATUS="request terminate"
```

> {primary} for value DB_DATABASE, DB_USERNAME, DB_PASSWORD according to your server configuration.

configuration crontab

```bash
crontab -e

# in the bottom line fill with
* * * * * python3 /home/ubuntu/small-tools-reverse-ssh/python/linux-server/terminate_pid.py
```

> {info} for command python 3, according to your server configuration, you can use python3 or python
