@extends('layouts.pelajar')

@section('content')
  


    <section class="py-10 overflow-hidden">
        <div class="container mx-auto flex justify-center">
            <div class="py-2 w-full px-2  rounded-xl">
                
                <div class="flex w-full items-center space-x-3">
                         <h1 class="flex w-full w-auto justify-center text-lg font-sans font-semibold text-center text-black">
                            {{ $name->room }}
                        </h1>
                        <h3 class="group relative flex w-full w-auto justify-center   px-3 py-2 text-lg font-sans font-semibold  " id="timer"></h3>
                        <button class="group relative flex w-full w-auto justify-center " id="toggleButton"><i class="fi fi-rr-expand"></i> </button>
                      
                </div>
              
                    <form class="font-roboto" method="POST" action="{{ url('/pelajar/room/'.$link->id.'/room_post') }}"
                        onsubmit="return confirmSubmit()" enctype="multipart/form-data">
                    <div id="fullScreenDiv" class="py-1 w-full px-1 space-y-2 bg-color-F4F2DE  flex justify-center items-center">

                        @csrf
                        
                        <input type="hidden" name="current_question" id="current_question" value="0">
                        <div class="py-2 w-full px-2 space-y-2 rounded-xl  space-y-4" id="questionContainer">
                        
                            @foreach ($quizzes as $key => $row)
                            <div class="question" id="question_{{ $key }}" style="{{ $key > 0 ? 'display:none' : '' }}">
                           
                                <div
                                    class="w-full max-w-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 space-y-4">
                                               
                                            <div
                                                class="flex text-xl font-semibold tracking-tight text-gray-900 dark:text-white py-4 px-4 space-x-2">
                                               
                                                {{ $key + 1 }}.   {!! $row->question !!} 
                                            </div>

                                            <img class="h-auto max-w-md rounded-lg px-4 py-4" src="{{ asset ('quiz/'.$row->image) }}" alt="{{ $row->image }}">

                                               
                                           
                                                
                                    <div class="px-2 pb-2 space-y-4">
                                        
                                    

                                        <div class="flex justify-center items-center py-2">

                                            <div class="flex w-full items-center space-x-2">
                                                <div class="flex items-center space-x-2 space-py-2 w-auto w-full">
                                                    <input value="a" {{ old('answer')=="a" ?? "checked" }}
                                                        name="answer[{{ $row->id }}]" type="radio" id="answer1{{ $key + 1 }}"
                                                        class="hidden"
                                                    >
                                                    <label for="answer1{{ $key + 1 }}"
                                                        class="w-full bg-red-500 text-xl font-semibold text-white py-4 px-4  shadow hover:bg-white hover:text-black focus-visible:outline shadow-green-600 hover:shadow-black cursor-pointer">
                                                        <i class="fi fi-rr-expand"></i>  {{ $row->a }}
                                                    </label>
                                                </div>



                                                <div class="flex items-center space-x-2 w-auto w-full">
                                                    <input value="b" {{ old('answer')=="b" ?? "checked" }}
                                                        name="answer[{{ $row->id }}]" type="radio" id="answer2{{ $key + 1 }}"
                                                        class="hidden"
                                                    >
                                                    <label for="answer2{{ $key + 1 }}"
                                                        class="w-full bg-red-500 text-xl font-semibold text-white py-4 px-4  shadow hover:bg-white hover:text-black focus-visible:outline shadow-green-600 hover:shadow-black cursor-pointer">
                                                        {{ $row->b }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-center items-center py-2">


                                            <div class="flex w-full items-center space-x-2">


                                                @if(!is_null($row->c))

                                                <div class="flex items-center space-x-2 w-auto w-full">
                                                    <input value="c" {{ old('answer')=="c" ?? "checked" }}
                                                        name="answer[{{ $row->id }}]" type="radio" id="answer3{{ $key + 1 }}"
                                                        class="hidden"
                                                    >
                                                    <label for="answer3{{ $key + 1 }}"
                                                        class="w-full bg-red-500 text-xl font-semibold text-white py-4 px-4  shadow hover:bg-white hover:text-black focus-visible:outline shadow-green-600 hover:shadow-black cursor-pointer">
                                                        {{ $row->c }}
                                                    </label>
                                                </div>

                                                <div class="flex items-center space-x-2 w-auto w-full">
                                                    <input value="d" {{ old('answer')=="d" ?? "checked" }}
                                                        name="answer[{{ $row->id }}]" type="radio" id="answer4{{ $key + 1 }}"
                                                        class="hidden"
                                                    >
                                                    <label for="answer4{{ $key + 1 }}"
                                                        class="w-full bg-red-500 text-xl font-semibold text-white py-4 px-4  shadow hover:bg-white hover:text-black focus-visible:outline shadow-green-600 hover:shadow-black cursor-pointer">
                                                        {{ $row->d }}
                                                    </label>
                                                </div>
                                                @endif
                                            



                                            

                                              
                                            </div>



                                        </div>
                                    </div>
                                </div>






                            </div>
                            @endforeach

                            <div class="flex justify-center items-center py-2">
                                <div class="flex w-full items-center space-x-2">
                                    <!--button type="button" onclick="previousQuestion()"
                                        class="group relative flex w-full w-auto justify-center rounded-md bg-green-400 px-3 py-2 text-base font-normal text-white hover:bg-white hover:text-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 shadow shadow-green-600 hover:shadow-white"
                                        id="prevButton">
                                        Sebelumnya
                                    </button-->
                                    <button type="button" onclick="nextQuestion()"
                                        class="group relative flex w-full w-auto justify-center rounded-md bg-green-400 px-3 py-2 text-base font-normal text-white hover:bg-white hover:text-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 shadow shadow-green-600 hover:shadow-white"
                                        id="nextButton">
                                        Selanjutnya
                                    </button>
                                    <button type="submit"
                                        class="group relative flex w-full w-auto justify-center rounded-md bg-green-400 px-3 py-2 text-base font-normal text-white hover:bg-white hover:text-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 shadow shadow-green-600 hover:shadow-white"
                                        id="submitButton" style="display:none">
                                        Kirim
                                    </button>
                                </div>
                            </div>


                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        const toggleButton = document.getElementById('toggleButton');
            const fullScreenDiv = document.getElementById('fullScreenDiv');

            toggleButton.addEventListener('click', () => {
                if (!document.fullscreenElement) {
                    fullScreenDiv.style.display = 'block';
                    fullScreenDiv.requestFullscreen().catch((err) => {
                        alert(`Error attempting to enable full-screen mode: ${err.message}`);
                    });
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                        fullScreenDiv.style.display = 'none';
                    }
                }
            });

            // Listen for fullscreen change event
            document.addEventListener('fullscreenchange', () => {
                if (!document.fullscreenElement) {
                    fullScreenDiv.style.display = 'block';
                }
            });

    </script>

    <script>
        /*
    let currentQuestion = 0;
    const totalQuestions = {{ count($quizzes) }};

    function showQuestion(questionIndex) {
        const questions = document.querySelectorAll('.question');
        questions.forEach((question, index) => {
            if (index === questionIndex) {
                question.style.display = 'block';
            } else {
                question.style.display = 'none';
            }
        });
    }

    function nextQuestion() {
        if (currentQuestion < totalQuestions - 1) {
            currentQuestion++;
            showQuestion(currentQuestion);
        }
        toggleButtons();
    }

    function previousQuestion() {
        if (currentQuestion > 0) {
            currentQuestion--;
            showQuestion(currentQuestion);
        }
        toggleButtons();
    }

    function toggleButtons() {
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        const submitButton = document.getElementById('submitButton');

        prevButton.style.display = currentQuestion === 0 ? 'none' : 'block';
        nextButton.style.display = currentQuestion === totalQuestions - 1 ? 'none' : 'block';
        submitButton.style.display = currentQuestion === totalQuestions - 1 ? 'block' : 'none';
    }

    showQuestion(currentQuestion);
    toggleButtons();

    */
    let currentQuestion = 0;
const totalQuestions = {{ count($quizzes) }};
let timer;

function showQuestion(questionIndex) {
    // Clear the previous timer when switching to a new question
    clearTimeout(timer);

    const questions = document.querySelectorAll('.question');
    questions.forEach((question, index) => {
        if (index === questionIndex) {
            question.style.display = 'block';
        } else {
            question.style.display = 'none';
        }
    });

    // Set a new timer for 15 seconds when showing a new question
    startTimer();
}

function startTimer() {
    let secondsRemaining = 15;
    const timerElement = document.getElementById('timer');

    function updateTimer() {
        timerElement.textContent = `Time left: ${secondsRemaining} seconds`;

        if (secondsRemaining === 0) {
            // Move to the next question when the time is up
            nextQuestion();
        } else {
            secondsRemaining--;
            // Call the updateTimer function recursively every second
            timer = setTimeout(updateTimer, 1000);
        }
    }

    // Initial call to start the timer
    updateTimer();
}

function nextQuestion() {
    if (currentQuestion < totalQuestions - 1) {
        currentQuestion++;
        showQuestion(currentQuestion);
    }
    toggleButtons();
}

function previousQuestion() {
    if (currentQuestion > 0) {
        currentQuestion--;
        showQuestion(currentQuestion);
    }
    toggleButtons();
}
/*
function toggleButtons() {
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const submitButton = document.getElementById('submitButton');

    prevButton.style.display = currentQuestion === 0 ? 'none' : 'block';
    nextButton.style.display = currentQuestion === totalQuestions - 1 ? 'none' : 'block';
    submitButton.style.display = currentQuestion === totalQuestions - 1 ? 'block' : 'none';
}
*/
function toggleButtons() {
    const nextButton = document.getElementById('nextButton');
    const submitButton = document.getElementById('submitButton');

    nextButton.style.display = currentQuestion === totalQuestions - 1 ? 'none' : 'block';
    submitButton.style.display = currentQuestion === totalQuestions - 1 ? 'block' : 'none';
}

showQuestion(currentQuestion);
toggleButtons();

</script>
@endsection
