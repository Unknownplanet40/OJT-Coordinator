# On The Job Training (OJT) Coordinator System
## Description
This is a web application that will help the OJT Coordinator to manage the OJT Applications, Evaluation Forms, Trainee Documents, and Events and Announcements. This application will also help the Trainee to upload their documents, view their application status, and view their evaluation results.

## Installation
1. Download the project as a zip file.
2. Extract the zip file to httdocs folder of your XAMPP installation.
```
C:\xampp\htdocs
```
3. Open the XAMPP Control Panel and start the Apache and MySQL modules.

4. Go to database folder and import the database file to your MySQL server.
```
C:\xampp\htdocs\OJT-Coordinator\database\OJT_CS_Database.sql
```
5. Open your browser and go to the following URL.
```
localhost/OJT-Coordinator
```
6. Login using the following credentials.
```
Administrator
username: ryanjames
password: @Capadocia123

Moderator
username: jamesveloria
password: @Veloria123

User/Trainee
username: lorenzoasis
password: Lorenzo.asis2023

```
> **Note:** You can change the credentials in the database. or you can create a new account in the application.

if you incoutered an error like this:
```
TCPDF ERROR:TCPDF requires the Imagick or GD extension to handle PNG images with alpha channel.
```
you can fix it by following this steps:
1. open your xampp control panel
2. click the config button of the apache module
3. click the `php.ini`
4. search for the `extension=gd` or `extension=imagick`
5. remove the semicolon (;) in the beginning of the line
6. save the file
7. restart the apache module

## Screenshots
see the [Screenshots](./ScreenShots) folder for more screenshots.
### Admin / Moderator(Coordinator)
![Admin](./ScreenShots/New%20Version/Admin%20Dashboard.png)
### Trainee
![Trainee](./ScreenShots/New%20Version/Trainee%20Dashboard.png)

## Information
This project was created by the following students of the Cavite State University - Imus Campus (CvSU) in compliance to DCIT 60A - Integrated Programming and Technologies 1

| **DATE** |        |        |
| :---  |  :---: |  :---: |
| <small>2nd Semester</small> | May 21 to Jul 12, 2023 |1 Month and 3 Weeks|
| <small>Mid Year - Summer Sem</small> | Aug 6 to Sep 3, 2023 |4 Weeks|

### Developers and Contributors
<div align="center">

<p>2nd Semester</p>

| Name | Role | Year | Course |
| :--- | :--- | :---: | :---: |
| [**Ryan James V. Capadocia**](https://github.com/Unknownplanet40) | Head Developer | 2nd Year | BSIT |
| [**James Matthew R. Veloria**](https://github.com/JamesVeloria16) | Full-Stack Developer | 2nd Year | BSIT |
| [**Jeric C. Dayandante**](https://github.com/kuya-G) | Full-Stack Developer | 2nd Year | BSIT 
| [**Brandon Logon**](#developers-and-contributors) | Back-End Developer | 2nd Year | BSIT |
| [**Lorenzo Asis**](#developers-and-contributors) | Quality Assurance | 2nd Year | BSIT |

<p>Mid Year - Summer Sem</p>

| Name | Role | Year | Course |
| :--- | :--- | :---: | :---: |
| [**Ryan James V. Capadocia**](https://github.com/Unknownplanet40) | Head Developer | 2nd Year | BSIT |
| [**James Matthew R. Veloria**](https://github.com/JamesVeloria16) | Full-Stack Developer | 2nd Year | BSIT |
| [**Lorenzo Asis**](#developers-and-contributors) | Quality Assurance | 2nd Year | BSIT |
| [**Pia Nicole Agustin**<sup> Group 6</sup>](#developers-and-contributors) | Quality Assurance | 2nd Year | BSIT |

</div>

### Instructors <sup>(2nd Semester)</sup>

| Name | Subject |
| :---: | :--- |
|[**[...]**](#instructor) | **DCIT 60A** - INTEGRATED PROGRAMMING AND TECHNOLOGIES 1 |
|[**[...]**](#instructor) | **DCIT 55A** - ADVANCE DATABASE MANAGEMENT SYSTEM |
| [**[...]**](#instructor) | **ITEC 65A** - OPEN SOURCE TECHNOLOGY |

### Instructor <sup>(Mid Year - Summer Sem)</sup>
| Name | Subject |
| :---: | :--- |
|[**[...]**](#instructor) | **ITEC 75A** - SYSTEM INTEGRATION AND ARCHITECTURE 1 |

## License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


## Acknowledgments & Technologies Used
- [Bootstrap](https://getbootstrap.com/)
- [jQuery](https://jquery.com/)
- [Chart.js](https://www.chartjs.org/)
- [sweetalert2](https://sweetalert2.github.io/)
- [Google Fonts](https://fonts.google.com/)
- [Google Icons](https://fonts.google.com/icons)
- [XAMPP](https://www.apachefriends.org/download.html)
- [Visual Studio Code](https://code.visualstudio.com/download)
- [Git](https://git-scm.com/downloads)
- [PHP](https://www.php.net/downloads)
- [MySQL](https://www.mysql.com/downloads/)
- [HTML](https://html.com/)
- [CSS](https://www.w3.org/Style/CSS/Overview.en.html)
- [JavaScript](https://www.javascript.com/)


## Resources
> Credits to the following for the images, Design, Color Scheme, Tutorials, and other resources used in the project:

- [Freepik](https://www.freepik.com/)
- [SVG Icons](https://www.svgrepo.com/collection/iconsax-duotone-filled-icons)
- [Color Pallette](https://www.color-hex.com/color-palette/77108)
- [Free Frontend](https://freefrontend.com/)
- [Stack Overflow](https://stackoverflow.com/)
- [ChatGPT](https://chat.openai.com/)
- [Chart](https://www.chartjs.org/)
- [Figma](https://www.figma.com/)
- [GitHub](https://github.com/Unknownplanet40)
- [Google Bard](https://bard.google.com/)
- [TCPDF](https://tcpdf.org/)
- [Heikei](https://app.haikei.app/)
- [lordicon](https://lordicon.com/icons)
- [BGjar](https://bgjar.com/)


> **Note:** <br> 
> This project is currently in development and fully offline, so some features may not function as expected. Please keep in mind that it is intended solely for educational purposes.






