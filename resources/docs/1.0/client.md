# Client

- [Client](#client)
  - [Requirement](#requirement)
  - [Installation](#installation)
  - [RunFileBat](#runfilebat)
  - [TerminatePlinkExe](#terminateplinkexe)
  - [PingServer](#pingserver)

<a name="section-1"></a>
## Requirement

1. windows os with feature remote desktop is enable

2. install the python programming language with the latest version

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

create 3 task schedule

- `RunFileBat`
- `TerminatePlinkExe`
- `PingServer`
-
## RunFileBat
+ Step 1
  + Open Start, Search for `Task Scheduler` and press enters to open `Task Scheduler`.
+ Step 2
  + Right-click on the `Task Scheduler Library` and click on the `Create Task` option.
  ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTask.PNG)
  + Then fill columns on tab `General` like below this
  ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/Asset1CreateTaskRunFileBatGeneralTab.PNG)
  + Then click tab `Actions`, next click button `new`
  + On the `New Action` windows
    + Action must be set : `Start a program`
    + fill field `Program/script` with path python
      ```bash
        # Example like this
        C:\Users\Administrator\AppData\Local\Programs\Python\Python311\python.exe
      ```
    + fill field `Add arguments (optional)` with path file `run_file_bat.py`
      ```bash
        # Example like this
        C:\Users\Administrator\Documents\small-tools-reverse-ssh\python\windows\client\run_file_bat.py
      ```
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/Asset2CreateTaskRunFileBatActionsTab.PNG)
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/Asset3CreateTaskRunFileBatActionsTab2.PNG)
  + Next on click `Conditions` tab and follow like below this
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTaskConditionsTab.PNG)
  + Next on click `Settings` tab and follow like below this
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTaskSettingsTab.PNG)
  + Next on click `Triggers` tab and follow like below this
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTaskTriggersTab.PNG)

## TerminatePlinkExe
+ Step 1
  + Open Start, Search for `Task Scheduler` and press enters to open `Task Scheduler`.
+ Step 2
  + Right-click on the `Task Scheduler Library` and click on the `Create Task` option.
  ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTask.PNG)
  + Then fill columns on tab `General` like below this
  ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/Asset1CreateTaskTerminatePlinkExeGeneralTab.PNG)
  + Then click tab `Actions`, next click button `new`
  + On the `New Action` windows
    + Action must be set : `Start a program`
    + fill field `Program/script` with path python
      ```bash
        # Example like this
        C:\Users\Administrator\AppData\Local\Programs\Python\Python311\python.exe
      ```
    + fill field `Add arguments (optional)` with path file `terminate_plink.py`
      ```bash
        # Example like this
        C:\Users\Administrator\Documents\small-tools-reverse-ssh\python\windows\client\terminate_plink.py
      ```
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/Asset2CreateTaskTerminatePlinkExeActionsTab.PNG)
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/Asset3CreateTaskTerminatePlinkExeActionsTab2.PNG)
  + Next on click `Conditions` tab and follow like below this
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTaskConditionsTab.PNG)
  + Next on click `Settings` tab and follow like below this
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTaskSettingsTab.PNG)
  + Next on click `Triggers` tab and follow like below this
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTaskTriggersTab.PNG)

## PingServer
+ Step 1
  + Open Start, Search for `Task Scheduler` and press enters to open `Task Scheduler`.
+ Step 2
  + Right-click on the `Task Scheduler Library` and click on the `Create Task` option.
  ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTask.PNG)
  + Then fill columns on tab `General` like below this
  ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/Asset1CreateTaskPingServerGeneralTab.PNG)
  + Then click tab `Actions`, next click button `new`
  + On the `New Action` windows
    + Action must be set : `Start a program`
    + fill field `Program/script` with path python
      ```bash
        # Example like this
        C:\Users\Administrator\AppData\Local\Programs\Python\Python311\python.exe
      ```
    + fill field `Add arguments (optional)` with path file `ping_server.py`
      ```bash
        # Example like this
        C:\Users\Administrator\Documents\small-tools-reverse-ssh\python\windows\client\ping_server.py
      ```
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/Asset2CreateTaskPingServerActionsTab.PNG)
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/Asset3CreateTaskPingServerActionsTab2.PNG)
  + Next on click `Conditions` tab and follow like below this
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTaskConditionsTab.PNG)
  + Next on click `Settings` tab and follow like below this
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTaskSettingsTab.PNG)
  + Next on click `Triggers` tab and follow like below this
    ![screenshot](http://rssh.la790x.xyz/docs/1.0/assets/AssetCreateTaskTriggersTab.PNG)
