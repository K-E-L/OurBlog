<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = Article::create([
            'title' => 'Trump impeachment: What to expect from Senate trial',
            'source' => 'https://www.bbc.com/news/world-us-canada-55586677',
            'body' => 'Former US President Donald Trump is being put on trial by lawmakers for allegedly inciting a riot at the US Capitol.

Last month Mr Trump became the first president in US history to be charged with misconduct - or impeached - twice by the lower chamber of Congress.

Republicans and Democrats in the House of Representatives voted to pass an article of impeachment that accused Mr Trump of "incitement of insurrection".

The article alleged that Mr Trump had made false allegations of election fraud and encouraged his supporters to storm Congress on 6 January.

Now a trial is being held in the upper chamber of Congress, the Senate, which will decide whether to convict or clear Mr Trump of the charge.

This is an unprecedented moment for the US, which has never put an impeached president on trial after they have left office.

So, what can we expect?

How does the trial work?
The trial in the Senate is political, rather than criminal. A vote will be held at the end of the trial to determine whether Mr Trump is guilty of the charge.

A two-thirds majority of the 100-member Senate must back a guilty verdict to convict Mr Trump.

If Mr Trump is convicted, senators could also vote to bar him from ever holding public office again.


media captionHouse delivers impeachment charge against Donald Trump to the Senate
What happens when?
The trial opened on Tuesday with a four-hour debate on whether the proceedings were unconstitutional because Mr Trump is no longer president. A 56-44 majority then voted in favour of continuing, with six Republicans backing the measure.

Each side will then be given 16 hours in total to make their arguments, and this will be limited to eight hours in any one day.

There will be an option to request a debate and a vote on whether witnesses should be called.

Both Democrats and Republicans are said to favour a speedy trial, amid an ongoing effort to get President Joe Biden\'s Covid-19 relief plan approved.

It is thought a vote on a conviction could come as early as Monday if no witnesses are called.

What is the prosecution\'s case?
Democrats prosecuting the case opened the proceedings by showing a dramatic video montage of Mr Trump\'s 6 January speech and the deadly rioting by some of his supporters.

"That\'s a high crime and misdemeanour," Representative Jamie Raskin of Maryland - who is leading the case - said of the footage. "If that\'s not an impeachable offence, then there\'s no such thing."'
        ]);
        $article2 = Article::create([
            'title' => 'Trump survived his second impeachment trial today. Here\'s what you need to know.',
            'source' => 'https://www.cnn.com/politics/live-news/trump-impeachment-trial-02-13-2021/index.html',
            'body' => 'The Senate voted 57-43 today to acquit former President Trump of inciting an insurrection at the Capitol on Jan, 6.

Trump\'s second impeachment trial lasted five days with both House managers and defense lawyers presenting evidence and arguments to support their positions.

Our live coverage of the trial has ended, but in case you missed it, here\'s what you need to know about today\'s proceedings:

Trump acquitted: The vote to convict was 57 to 43, 10 short of the necessary threshold. It came after a long day of arguments over whether to allow witnesses at the trial and following closing arguments from both sides. Seven Republicans — Richard Burr, Bill Cassidy, Susan Collins, Lisa Murkowski, Mitt Romney, Ben Sasse and Pat Toomey — voted to convict.
House managers asked for witnesses: At the start of today\'s trial, House lead impeachment manager Rep. Jamie Raskin announced that the managers were seeking to subpoena Rep. Jaime Herrera Beutler, a House Republican who first revealed a conversation between House Republican leader Kevin McCarthy and Trump in which the former President said the rioters cared more about the election results than McCarthy did. After Raskin announced Democrats would seek witnesses, Trump\'s lawyer Michael van der Veen responded that if Democrats were going to ask for witnesses, Trump\'s team was going to need 100 depositions.
A bipartisan Senate vote on witnesses: The vote was 55 to 45, with five Republicans joining Democrats in voting to allow witnesses. GOP Sen. Lindsey Graham initially voted no, but changed his vote to yes, meaning he changed his vote to allow witnesses. 
Confusion and a break: Following the vote, there appeared to be some confusion on the Senate floor about the move, with one senator even asking what exactly they just voted on. Bipartisan groups of senators huddled, and the timeline of the trial seemed murky. Then the Senate went into a recess.
The evidence deal: Returning from the break, Senate leaders, the House managers and Trump’s legal team announced they had agreed to insert the statement of Rep. Herrera Beutler from a CNN report into the trial record, rather than taking a deposition. 
Closing arguments: The House impeachment managers and Trump\'s team then moved on to their closing arguments, signaling the trial would end without witnesses.'
        ]);
        $article3 = Article::create([
            'title' => 'Trump\'s impeachment trial: Everything you need to know',
            'source' => 'https://www.foxnews.com/politics/trumps-impeachment-trial-everything-you-need-to-know',
            'body' => 'Former President Donald Trump\'s second impeachment trial continues in the Senate on Wednesday after senators voted that they can constitutionally proceed with the affair. 

Arguments on the merits of the impeachment article are set to begin at 12 p.m. after the Senate on Tuesday voted 56-44 that the trial could move forward after a highly criticized performance from Trump\'s impeachment lawyers. 

Sen. Bill Cassidy, R-La., was the only Republican who voted to move ahead with the trial after previously voting that it was unconstitutional on a vote last month. He said that vote "is not a prejudgment on the final vote to convict."

WHEN DOES THE TRUMP IMPEACHMENT TRIAL START AND HOW DO I WATCH?

"If anyone disagrees with my vote and would like an explanation, I ask them to listen to the arguments presented by the House managers and former President Trump’s lawyers. The House managers had much stronger constitutional arguments. The president’s team did not," Cassidy said. 

President Donald Trump arrives to speak at a rally Wednesday, Jan. 6, 2021, in Washington. (AP Photo/Jacquelyn Martin)
President Donald Trump arrives to speak at a rally Wednesday, Jan. 6, 2021, in Washington. (AP Photo/Jacquelyn Martin)
Meanwhile, Sen. Lisa Murkowski, R-Alaska, said of the Trump legal team\'s case: "I don\'t think it was very persuasive." 

"I thought I knew where he was going, and I really didn\'t know where he was going," Sen Lindsey Graham, R-S.C., said of Trump attorney Bruce Castor.

"I\'m puzzled by the presentation by the first attorney," Sen. Susan Collins, R-Maine, said of Castor.

"I thought the president\'s lawyer the first lawyer just rambled on and on and on and didn\'t really address the constitutional argument," added Sen. John Cornyn, R-Texas. 

Trump himself was reportedly "furious" and "beyond angry" with his lawyers\' performance Tuesday, sources tell Fox News. 

"I\'m sorry he felt that way -- have to do better next time," Trump lawyer David Schoen said in response to Cassidy\'s criticisms of the Trump legal team. 

The former president was impeached on Jan. 13, just one week after a pro-Trump mob overtook the Capitol as Congress and former Vice President Mike Pence were certifying the results of President Biden\'s win in the 2020 election. 

TRUMP \'BEYOND ANGRY\' WITH IMPEACHMENT DEFENSE TEAM\'S SHOWING: SOURCES'
        ]);
    }
}
