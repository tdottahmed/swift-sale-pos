<style>
    @import url(https://fonts.googleapis.com/css?family=Droid+Sans+Mono|Pacifico|Oxygen);
    .title{
        display: flex;
        justify-content: space-between;
    }
    .calc-title {
        margin: 0;
        font-family: Pacifico;
        position: relative;
        left: 5%;
    }

    .calculator {
        position: relative;
        margin: 1em auto;
        padding: 1em 0;
        display: block-inline;
        width: 350px;
        background-color: #444;
        border-radius: 25px;
        box-shadow: 5px 5px 15px 3px #111;
        font-family: 'Oxygen';
    }

    .calc-row {
        text-align: center;
    }

    .calc-row div.screen {
        font-family: Droid Sans Mono;
        display: table;
        width: 85%;
        background-color: #aaa;
        text-align: right;
        font-size: 2em;
        min-height: 1.2em;
        margin-left: 0.5em;
        padding-right: 0.5em;
        border: 1px solid #888;
        color: #f5f2f2;
    }

    .calc-row div {
        text-align: center;
        display: inline-block;
        font-weight: bold;
        border: 1px solid #555;
        padding: 10px 0;
        margin: 7px 5px;
        border-radius: 15px;
        box-shadow: 2px 2px 1px 1px #222;
        width: 50px;
        color: aliceblue;

    }

    .calc-row div.zero {
        width: 112px;
    }

    .calc-row div.zero {
        margin-right: 5px;
    }
</style>
<!-- Calculator Modal -->

    <div id="calculatorModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-right">
            <div class="calculator modal-content">
                <div class="title modal-header">
                    <p class="calc-title modal-title" style="color: aliceblue">Swift Sale</p>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="calc-row">
                    <div class="screen">0123456789</div>
                </div>

                <div class="calc-row">
                    <div class="button">C</div>
                    <div class="button">CE</div>
                    <div class="button backspace">back</div>
                    <div class="button plus-minus">+/-</div>
                    <div class="button">%</div>
                </div>

                <div class="calc-row">
                    <div class="button">7</div>
                    <div class="button">8</div>
                    <div class="button">9</div>
                    <div class="button divice">/</div>
                    <div class="button root">sqrt</div>
                </div>

                <div class="calc-row">
                    <div class="button">4</div>
                    <div class="button">5</div>
                    <div class="button">6</div>
                    <div class="button multiply">*</div>
                    <div class="button inverse">1/x</div>
                </div>

                <div class="calc-row">
                    <div class="button">1</div>
                    <div class="button">2</div>
                    <div class="button">3</div>
                    <div class="button">-</div>
                    <div class="button pi">pi</div>
                </div>

                <div class="calc-row">
                    <div class="button zero">0</div>
                    <div class="button decimal">.</div>
                    <div class="button">+</div>
                    <div class="button equal">=</div>
                </div>
            </div>
        </div>
    </div>

<!-- Calculator Script -->
<script>
   $(document).ready(function() {
    var result = 0;
    var prevEntry = 0;
    var operation = null;
    var currentEntry = '0';
    updateScreen(result);

    $('.button').on('click', function(evt) {
        var buttonPressed = $(this).text();

        if (buttonPressed === "C") {
            result = 0;
            currentEntry = '0';
        } else if (buttonPressed === "CE") {
            currentEntry = '0';
        } else if (buttonPressed === "back") {
            currentEntry = currentEntry.slice(0, -1);
        } else if (buttonPressed === "+/-") {
            currentEntry *= -1;
        } else if (buttonPressed === '.') {
            if (!currentEntry.includes('.')) {
                currentEntry += '.';
            }
        } else if (isNumber(buttonPressed)) {
            if (currentEntry === '0') {
                currentEntry = buttonPressed;
            } else {
                currentEntry += buttonPressed;
            }
        } else if (isOperator(buttonPressed)) {
            prevEntry = parseFloat(currentEntry);
            operation = buttonPressed;
            currentEntry = '';
        } else if (buttonPressed === '%') {
            currentEntry = parseFloat(currentEntry) / 100;
        } else if (buttonPressed === 'sqrt') {
            currentEntry = Math.sqrt(parseFloat(currentEntry));
        } else if (buttonPressed === '1/x') {
            currentEntry = 1 / parseFloat(currentEntry);
        } else if (buttonPressed === 'pi') {
            currentEntry = Math.PI;
        } else if (buttonPressed === '=') {
            currentEntry = operate(prevEntry, currentEntry, operation);
            operation = null;
        }
        updateScreen(currentEntry);
    });
});

updateScreen = function(displayValue) {
    var displayValue = displayValue.toString();
    $('.screen').text(displayValue.substring(0, 10));
};

isNumber = function(value) {
    return !isNaN(value);
};

isOperator = function(value) {
    return value === '/' || value === '*' || value === '+' || value === '-';
};

operate = function(a, b, operation) {
    a = parseFloat(a);
    b = parseFloat(b);
    if (operation === '+') return a + b;
    if (operation === '-') return a - b;
    if (operation === '*') return a * b;
    if (operation === '/') return a / b;
};
</script>

