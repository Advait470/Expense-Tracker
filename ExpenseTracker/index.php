
<?php 
    $page_title = "Expense Tracker = Homepage";
    include_once'partials/header.php';
?>

<script type="text/javascript">
      
</script>

<main class="flag">
  <div class="bg-light p-5 rounded">
    <h1 style="color:#97BFB4;">Expense Tracker</h1>
    <p class="lead">Track Your Money without any problems</p>
    
    <?php if(!isset($_SESSION['username'])): ?>
    <p class="lead">You are currently not signed in <a href="Login.php">Login</a> Not yet a member? <a href="Signup.php">Signup</a></p>
    <?php else: ?>
    <p class="lead">You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">logout</a></p>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap');

:root {
  --bg: #97BFB4;
  --text: #fff0f0;
  --line: #ebd4d4;
  --last: #835858;
  --box-shadow: 0 1px 5px rgba(250, 250, 250, 0.2),
    0 1px 5px rgba(255, 255, 255, 0.3);
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body {
  font-family: "Ubuntu", cursive;
  background-color: var(--bg);
  color: var(--text);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin: 0;
  min-height: 100vh;
}
.container {
  margin: 30px auto;
  width: 80%;
  padding: 3%;
  /* border: 1px solid black; */
  background-color: #F5EEDC;
  border-radius: 10px;
  color: black;
}
h1 {
  letter-spacing: 1px;
  margin: 0;
}
h3 {
  border-bottom: 1px solid var(--line);
  padding: 10px;
  margin: 40px 0 10px;
}
h4 {
  margin: 0;
  text-transform: uppercase;
  color: var(--last);
}
p {
  color: var(--bg);
  font-weight: bold;
}
.inc-exp-container {
  background-color: var(--line);
  padding: 20px;
  box-shadow: var(--box-shadow);
  display: flex;
  justify-content: space-between;
  margin: 20px 0;
}
.inc-exp-container > div {
  flex: 1;
  text-align: center;
}
.inc-exp-container > div:first-of-type {
  border-right: 1px solid var(--last);
}
.money {
  font-size: 20px;
  letter-spacing: 1px;
  margin: 5px 0;
}
.money.plus {
  color: forestgreen;
}
.money.minus {
  color: crimson;
}
label {
  display: inline-block;
  margin: 10px 0;
  font-size: large;
  font-weight: bold;
  text-decoration: underline;
}
input[type="text"],
input[type="number"] {
  border: 1px solid var(--last);
  border-radius: 5px;
  display: block;
  font-size: 16px;
  padding: 10px;
  width: 100%;
}
.btn {
  border-radius: 10px;
  cursor: pointer;
  background-color: var(--line);
  box-shadow: var(--box-shadow);
  border-style: none;
  color: var(--bg);
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin: 20px 0 20px;
  padding: 10px;
  width: 100%;
}

.btn:hover {
  background-color: #97BFB4;
  color:#eeee;
}

.btn:focus,
.delete-btn:focus {
  outline: none;
}
.list {
  list-style-type: none;
  padding: 0;
  margin-bottom: 40px;
}
.list li {
  background-color: var(--text);
  color: var(--bg);
  display: flex;
  justify-content: space-between;
  position: relative;
  padding: 10px;
  margin: 10px 0;
}
.list li.plus {
  border-right: 5px solid forestgreen;
}
.list li.minus {
  border-right: 5px solid crimson;
}
.delete-btn {
  cursor: pointer;
  background-color: var(--line);
  border: 0;
  font-size: 20px;
  line-height: 20px;
  padding: 2px 5px;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translate(-100%, -50%);
  opacity: 0;
  transition: opacity 0.3s ease-in;
}
.list li:hover .delete-btn {
  opacity: 1;
}

@media screen and (min-width: 768px) {
  .container{
    width: 90%;
  }
}



    </style>

    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F5EEDC;">
      <div class="container-fluid">
        <a class="navbar-brand" style="margin-left: 0%;font-size: 1.5rem;" href="#">Expense Tracker</a>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./details.html">Details</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h4 style="margin-top: 5%;">Your balance</h4>
    <h1 id="balance">0</h1>
    <div class="inc-exp-container">
      <div>
        <h4>income</h4>
        <p id="money-plus" class="money plus">+$0.00</p>
      </div>
      <div>
        <h4>expense</h4>
        <p id="money-minus" class="money minus">-$0.00</p>
      </div>
    </div>
    <h3>History</h3>
    <ul id="list" class="list">

    </ul>
    <h3>add new transaction</h3>
    <form action="" id="form">
      <div class="form-control">
        <label for="text">Name Your transaction</label>
        <input type="text" id="text" placeholder="please enter the text..." />
      </div>
      <div class="form-control">
        <label for="amount">amount <br />(Enter - for an expense & + for an income, for e.g. -10)</label>
        <input type="number" id="amount" placeholder="please enter the amount..." />
      </div>
      <button class="btn">Add transation</button>
    </form>
  </div>
  <script>

const balance = document.getElementById("balance");
const money_plus = document.getElementById("money-plus");
const list = document.getElementById("list");
const form = document.getElementById("form");
const text = document.getElementById("text");
const amount = document.getElementById("amount");
const money_minus = document.getElementById("money-minus");


// let inputAmount = String(prompt("enter your amount"));
// console.log(inputAmount);
// document.getElementById("#balance").textContent = inputAmount;


document.querySelector('#balance').textContent = 35;

const localStorageTransations = JSON.parse(localStorage.getItem("transations"));

let transations =
  localStorage.getItem("transations") !== null ? localStorageTransations : [];

//add transation
function addTransation(e) {
  e.preventDefault();
  if (text.value.trim() === "" || amount.value.trim() === "") {
    text.placeholder = "please add a text";
    text.style.backgroundColor = "#ccc";
    amount.placeholder = "please add amount";
    amount.style.backgroundColor = "#ccc";
  } else {
    const transation = {
      id: genenrateID(),
      text: text.value,
      amount: +amount.value,
    };
    transations.push(transation);
    addTransationDOM(transation);
    updateValues();
    updateLocalStorage();
    text.value = "";
    amount.value = "";
  }
}
//generate id
function genenrateID() {
  return Math.floor(Math.random() * 100000000);
}

//add transations to dom list
function addTransationDOM(transation) {
  //get sign
  const sign = transation.amount < 0 ? "-" : "+";
  const item = document.createElement("li");
  //add class based on value
  item.classList.add(transation.amount < 0 ? "minus" : "plus");
  item.innerHTML = `${transation.text} <span>${sign}${Math.abs(
    transation.amount
  )}</span> <button class="delete-btn" onclick="removeTransation(${transation.id
    })">x</button>`;
  list.appendChild(item);
}
//update the balance
function updateValues() {
  const amounts = transations.map((transation) => transation.amount);
  const total = amounts.reduce((acc, item) => (acc += item), 0).toFixed(2);
  const income = amounts
    .filter((item) => item > 0)
    .reduce((acc, item) => (acc += item), 0)
    .toFixed(2);
  const expense = (
    amounts.filter((item) => item < 0).reduce((acc, item) => (acc += item), 0) *
    -1
  ).toFixed(2);

  balance.innerText = `$${total}`;
  money_plus.innerText = `$${income}`;
  money_minus.innerText = `$${expense}`;
}
//remove
function removeTransation(id) {
  transations = transations.filter((transation) => transation.id !== id);
  updateLocalStorage();
  init();
}

//updatelocal storage
function updateLocalStorage() {
  localStorage.setItem("transations", JSON.stringify(transations));
}

//init
function init() {
  list.innerHTML = "";
  transations.forEach(addTransationDOM);
  updateValues();
}
init();

form.addEventListener("submit", addTransation);


  </script>









    <?php endif ?>

  </div>
</main>
   
    <?php include_once 'partials/footer.php' ?>
    
    </body>
</html>