@extends('layouts.app')

@section('content')
<section class="set1 card">
    <article class="block1 card-header">
        <h1>{{$title}}</h1>
    </article>

    <article class="block2 card-body">
        <ul>

            <li>
                <a href="/webapps/dance" target="_new">Line Dancing</a> - This is a list of dances 
                that we have learned or want to learn.
                
            </li>

            <li>

                <a href="apps/calc/index.html" target="_new">12 Line Calculator</a> - This is a simple program
                that adds 12
                items

                together and stores them in the browser cache with localstorage. The checkbox to the left
                currently

                serves no purpose, but the checkbox on the right gives you the option to add or omit line items
                from the

                total, for goal or notation purposes.<br /><br />

            </li>
            <li>

                <a href="/webapps/drivertools">Driver Tools</a> - Tools used for driving for Uber, Lyft or
                Food
                Delivery.
                <ul>
                    <li>
                        Calculator - This is a simple program that adds 14 items together and stores them in the
                        browser
                        cache with localstorage. The checkbox to the left is used for transferring values, and
                        the checkbox
                        on the right gives you the option to add or omit line items from the total for goal or
                        notation
                        purposes.
                    </li>
                </ul>
                <br /><br />
            </li>
            <li>

                <a href="/webapps/foodbank" target="_new">FoodBank Listings</a> - This is a listing of
                foodbanks in the
                Denver

                Metro area. Using PHP, a flag is added to determine if the location is opened or closed for the
                current

                day. The logic takes into account recurring days of the month, for instance, first and third
                Thursday of the month.<br /><br />

            </li>

            <li>

                <a href="/webapps/alpha" target="_new">Phonetic app</a> - This program is used to convert
                any phrase to
                military

                words to keep from getting confused with other letters.

                I use this program for license plates or UberEats order numbers.<br /><br />

            </li>

            <li>

                <a href="apps/duel/duel.html" target="_new">The Duel In Rhyme</a> - The rhyme from Cyrano de
                Bergerac.

                A work in progress.<br /><br />

            </li>

            <li>

                <a href="apps/arithmetic/index.html" target="_new">Arithmetic</a> - Math program gives you 10
                math problems.<br /><br />

            </li>
        </ul>



    </article>

</section>

@endsection