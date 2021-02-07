<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('title',50);
            $table->string('description',250);
            $table->text('text');
            $table->integer('price')->length(10)->unsigned();
            $table->string('img',250);
            $table->timestamps();
        });
        DB::table('products')->insert(
            array(
                'title' => 'Pamantul fagaduintei',
                'description' => 'Pamantul fagaduintei, Barack Obama',
                'text'=>'Memoriile prezidentiale ale lui Barack Obama, al 44-lea presedinte al Statelor Unite, vor fi publicate in doua volume. Primul din ele, intitulat PAMANTUL FAGADUINTEI, e programat sa fie publicat la nivel international marti, 17 noiembrie 2020, si va aparea simultan in 25 de limbi. Coperta a fost, de asemenea, dezvaluita si poate fi vazuta ',
                'price'=>250,
                'img'=>'1.webp'
            )
        );
        DB::table('products')->insert(
            array(
                'title' => 'Viata mincinoasa a adultilor',
                'description' => 'Viata mincinoasa a adultilor, Elena Ferrante',
                'text'=>'Lumea interioara a Giovannei se prabuseste cand isi aude tatal spunand ca fata ei isi pierde dragalasenia si incepe sa semene cu cea a dispretuitei matusi Vittoria. Viata ei devine o cautare chinuitoare a oglinzii in care sa se poata vedea cu adevarat. Giovanna se cauta pe sine in doua orase inrudite ce se urasc reciproc: orasul Napoli al inaltimilor si al rafinamentului si acelasi oras, dar al adancurilor, un loc al excesului si al vulgaritatii. Fata se misca intre cele doua realitati inainte si inapoi, fara a gasi raspunsuri sau o cale de a se salva, ajungand in schimb la o maturizare pe care nu a dorit-o si care nu e nici pe departe atat de frumoasa pe cat a crezut ea.',
                'price'=>99,
                'img'=>'2.webp'
            )
        );
        DB::table('products')->insert(
            array(
                'title' => 'Si a fost seara, si a fost dimineata',
                'description' => 'Si a fost seara, si a fost dimineata, Ken Follett',
                'text'=>'Anul 997. Anglia este atacata de normanzi si de vikingi. Cei aflati la putere impart dreptatea dupa vointa lor, fara sa le pese de oamenii de rand si deseori in conflict cu regele. In aceste vremuri tulburi, se impletesc vietile a trei personaje: un tanar constructor de ambarcatiuni, a carui casa este atacata de vikingi, iar el este fortat sa ia viata de la capat...',
                'price'=>149,
                'img'=>'3.jpg'
            )
        );
        DB::table('products')->insert(
            array(
                'title' => 'Biblioteca de la miezul noptii',
                'description' => 'Biblioteca de la miezul noptii, Matt Haig',
                'text'=>'O singura biblioteca. O infinitate de vieti. Care e cea mai buna?Undeva, la marginea universului, exista o biblioteca infinita de carti, iar fiecare poveste din ele provine dintr-o alta realitate. Una spune povestea vietii tale asa cum e, alta spune povestea vietii tale asa cum ar fi fost daca ai fi luat alta decizie intr-un anumit moment. Toti ne intrebam mereu cum ar fi putut sa fie vietile noastre. Dar daca am gasi raspunsul intr-o biblioteca?',
                'price'=>99,
                'img'=>'4.webp'
            )
        );
        DB::table('products')->insert(
            array(
                'title' => 'Nu striga niciodata ajutor',
                'description' => 'Nu striga niciodata ajutor, Mircea Cartarescu',
                'text'=>'Nu striga niciodata ajutor este al optulea volum de versuri al lui Mircea Cartarescu si se poate spune ca e diferit de toata poezia lui precedenta. Scris la treizeci de ani dupa penultimul volum, timp in care autorul n-a mai scris niciun vers, el reprezinta o intoarcere la simplitatea si generalitatea poeziei genuine, imediate si emotionale, dezbracate de sofisticarea intelectuala si culturala din vechea sa poezie.',
                'price'=>200,
                'img'=>'5.webp'
            )
        );
        DB::table('products')->insert(
            array(
                'title' => 'Gandeste ca un calugar',
                'description' => 'Gandeste ca un calugar, Jay Shetty',
                'text'=>'Superputerea lui Jay Shetty este sa faca intelepciunea accesibila si relevanta. Cartea sa este profunda, practica si iti atrage atentia. Credem ca va ajuta multa lume sa isi creeze noi obiceiuri, practici si o intelepciune de viata care ii va conduce spre existenta pe care si-o doresc cu adevarat.“ WILL SMITH & JADA PINKETT SMITH',
                'price'=>228,
                'img'=>'6.webp'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
