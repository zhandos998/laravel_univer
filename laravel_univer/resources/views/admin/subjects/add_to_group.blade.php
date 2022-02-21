@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                <form method="POST" action="/admin/subject/add_to_group/{{$id}}">
                    @csrf
                    <div class="form-group autocomplete">
                        <label for="group">Мұғалімнің аты: </label>
                        <input id="teacher_name" class="form-control" autocomplete="off">
                        <input id="teacher_id" name="group_id" style="display: none">
                    </div>

                    <button type="submit" class="btn btn-primary">Қосу</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        * { box-sizing: border-box; }
        .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        /* display: inline-block; */
        }
        input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
        }
        input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
        }
        input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        }
        .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
        }
        .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
        }
        .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
        }
        .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
        }
    </style>
    <script>
        var countries = [
            @foreach ($groups as $group)
                {'id':{{$group->id}},'country':"{{$group->class.' '.$group->letter.' '.$group->name}}"},
            @endforeach
        ];

        function autocomplete(inp, arr) {
            var currentFocus;
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value,col = 0,f=false;
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                this.parentNode.appendChild(a);
                for (i = 0; i < arr.length; i++) {
                    if (arr[i]["country"].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        f=true;
                        col++;
                        b = document.createElement("DIV");
                        b.innerHTML = "<strong>" + arr[i]["country"].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i]["country"].substr(val.length);
                        b.innerHTML += "<input type='hidden' value='" + arr[i]["country"] + "'>";
                        b.addEventListener("click", function(e) {
                            addFinded(this.getElementsByTagName("input")[0].value);
                            // inp.value = "";
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                    if (col>10) break;
                }
                if (!f)
                {
                    b = document.createElement("DIV");
                    b.innerHTML = "Табылмады...";
                    a.appendChild(b);
                }
            });
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) { //down
                    currentFocus++;
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    currentFocus--;
                    addActive(x);
                } else if (e.keyCode == 13) { //enter

                    e.preventDefault();
                    if (currentFocus > -1) {
                    if (x)
                    {
                        addFinded(x[currentFocus].innerText);
                        x[currentFocus].click();
                    }
                    }
                }
            });
            function addActive(x) {
                if (!x) return false;
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                x[currentFocus].classList.add("autocomplete-active");
            }
            function removeActive(x) {
                for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
                }
            }
            function closeAllLists(elmnt) {
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
        }
        finded=[];
        function addFinded(country) {
            var b=true;
            for(var i=0;i<finded.length;i++)
            {
                if (finded[i]["country"]==country)
                {
                    b=false;
                    break;
                }
            }
            if (b)
            {
                for(var i=0;i<countries.length;i++)
                {
                    if (countries[i]["country"]==country)
                    {
                        var tn = document.getElementById("teacher_name");
                        tn.value = country;
                        var ti = document.getElementById("teacher_id");
                        ti.value = countries[i]["id"];
                        break;
                    }
                }
            }
        }
        function deleteFinded(id) {

            for(var i=0;i<finded.length;i++)
            {
                if (finded[i]["id"]==id)
                {
                    finded.splice(i, 1);
                }
            }
            var elem = document.getElementById("finded-"+id.toString());
            elem.parentNode.removeChild(elem);
            console.log(this.innerHTML);
        }
        autocomplete(document.getElementById("teacher_name"), countries);
    </script>
</div>
@endsection
