# 🎲 Dice Game

A PHP web application that simulates rolling dice for multiple players.

## 📌 Project Description

The application allows the user to enter 3 players, choose the number of dice and the number of rolls, then simulate the game automatically.

Each player receives random dice results and the system calculates the total score to determine the winner.

The project uses:
- PHP
- HTML
- CSS
- JavaScript
- Sessions (`$_SESSION`)

---

## ⚙️ Features

✅ Enter 3 players  
✅ Choose number of dice  
✅ Choose number of rolls  
✅ Random dice generation  
✅ Dice rolling animation  
✅ Automatic score calculation  
✅ Ranking system  
✅ Winner podium (1st, 2nd, 3rd place)  
✅ Winner display  
✅ Fireworks effect on results page  
✅ Automatic redirect after 10 seconds  
✅ Session support (`$_SESSION`)  

---

## 📂 Project Structure

```txt
DiceGame/
│
├── login.php
├── index.php
├── results.php
├── style.css
│
├── assets/
│   ├── dice-anim.gif
│   └── fireworks.gif
```

---

## 🖥️ Installation

1. Download the project
2. Copy the files into your Apache server directory (`htdocs`)
3. Start Apache
4. Open:

```txt
http://localhost/dice/login.php
```

---

## 🎮 Game Flow

1. User enters player names
2. User selects number of dice and rolls
3. The system rolls the dice
4. Total scores are calculated
5. Results and podium are displayed
6. After 10 seconds the game resets automatically

---

## 🧠 Technologies Used

- PHP
- HTML5
- CSS3
- JavaScript
- Apache
- Sessions

---

## 🌐 Application URL

Add the link to your virtual server here:

```txt
http://10.10.10.83/dice
```

---

## 👨‍💻 Author

Created as a school web programming project.
