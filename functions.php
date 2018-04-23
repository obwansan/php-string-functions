<?php

$str = 'Bacon ipsum dolor amet pastrami cupim short ribs, ham shoulder corned beef pork belly biltong tongue. 
  Ham alcatra landjaeger short ribs turkey. Ham hock pork chop short ribs, beef jerky alcatra drumstick bresaola 
  leberkas cow meatloaf turkey pastrami t-bone pancetta. 
  
  Pork loin kielbasa swine ground round andouille shoulder antidisestablishmentarianism
  bacon. Beef ribs capicola ham hock, pork chop shoulder kielbasa bresaola sausage alcatra sirloin buffalo flank 
  pork loin biltong.
  
  Bacon ipsum dolor amet pastrami cupim short ribs, ham shoulder corned beef pork belly biltong tongue. 
  Ham alcatra landjaeger short ribs turkey. Ham hock pork chop short ribs, beef jerky alcatra drumstick bresaola 
  leberkas cow meatloaf turkey pastrami t-bone pancetta. Pork loin kielbasa swine ground round andouille shoulder 
  bacon. Beef ribs capicola ham hock, pork chop shoulder kielbasa bresaola sausage alcatra sirloin buffalo flank 
  pork loin biltong.';

/**
 * Counts characters in a string
 *
 * @param $str string
 *
 * @return integer number of characters
 */
function countCharacters($str) {
    return strlen($str);
}

/**
 * Counts words in a string
 *
 * @param $str string
 *
 * @return integer number of words
 */
function countWords($str) {
    return str_word_count($str);
}

/**
 * Counts sentences in a string
 *
 * @param $str string
 *
 * @return integer number of sentences
 */
function countSentences($str) {
    return preg_match_all('/[^\s](\.|\!|\?)(?!\w)/',$str,$match);
}

/**
 * Counts paragraphs in a string
 *
 * @param $str string
 *
 * @return integer number of paragraphs
 */
function countParagraphs($str) {
    return substr_count($str,"\n");
}

/**
 * Works out longest word in a string
 *
 * @param $str string
 *
 * @return String longest word
 */
function getLongestWord($str) {
    // get array of words
    $str = explode(' ', $str);

    $longestWordLength = 0;
    $longestWord = '';

    foreach ($str as $word) {
        if (strlen($word) > $longestWordLength) {
            $longestWordLength = strlen($word);
            $longestWord = $word;
        }
    }
    return $longestWord;
}

/**
 * Works out average length of sentences in string
 *
 * @param $str string
 *
 * @return integer average length of sentences
 */
function avgSentenceLength($str) {

    $totalLength = 0;

    // get number of sentences
    $numOfSentences = countSentences($str);

    // get array of sentences
    $strArr = explode('.', $str);
    // loop through sentences
    forEach($strArr as $sentence) {
        // count length of sentences / add to total
        $totalLength += countCharacters($sentence);
    }
    // divide total by number of sentences
    return ($totalLength / $numOfSentences);
}

function analyseString($str) {

    return  "<div>Number of characters: " . countCharacters($str) . "</div>" .
            "<div>Number of words: " . countWords($str) . "</div>" .
            "<div>Number of sentences: " . countSentences($str) . "</div>" .
            "<div>Number of paragraphs: " . countParagraphs($str) . "</div>" .
            "<div>Longest word: " . getLongestWord($str) . "</div>" .
            "<div>Average sentence length: " . avgSentenceLength($str) . "</div>";
}
