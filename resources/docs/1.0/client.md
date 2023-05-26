# Client

- [Client](#client)
  - [Requirement](#requirement)
  - [Installation](#installation)

<a name="section-1"></a>
## Requirement

1. windows os with enable remote desktop

2. install the Python programming language with the latest version

3. installed pip with latest version

4. python libraries installed
   - requests
   - python-dotenv
   - psutil

5. installed git

<a name="section-2"></a>
## Installation

go into the directory you want, example C:\Users\Administrator\Documents

```bash
cd C:\Users\Administrator\Documents
```

clone repository source code https://github.com/visi-global-teknologi/small-tools-reverse-ssh.git

```bash
git clone https://github.com/visi-global-teknologi/small-tools-reverse-ssh.git
```

go to project directory

```bash
cd small-tools-reverse-ssh
```

create file .env on windows-client directory & fill in the .env file with this

```bash
UNIQUE_CODE_DEVICE=xxxx

REST_API_RSSH_CONNECTION_UPDATE=http://rssh.la790x.xyz/api/public/rssh-connections/
REST_API_RSSH_CONNECTION_STATUS=http://rssh.la790x.xyz/api/public/rssh-connections/connection-status/
REST_API_RSSH_LOG=http://rssh.la790x.xyz/api/public/rssh-logs
REST_API_PING=http://rssh.la790x.xyz/api/public/pings

CMD_EXE=cmd.exe
PLINK_EXE=plink.exe

PID_SERVER_TERMINATED_CONNECTION_STATUS="pid server terminated"
PLINK_TERMINATED_CONNECTION_STATUS="plink terminated"
DISCONNECT_CONNECTION_STATUS="disconnect"
CONNECTED_CONNECTION_STATUS="connected"

```

> {primary} for value UNIQUE_CODE_DEVICE you can ask the administrator

configuration task schedule
