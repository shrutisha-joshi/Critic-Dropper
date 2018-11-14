import nltk
import string
import pymysql.cursors 
"""***************************"""


"""************************"""

def sentiment(id):
     
    rwstring = []
    # Connect to the database.
    connection = pymysql.connect(host='127.0.0.1',user='root',password='',db='reviews',charset='utf8mb4',cursorclass=pymysql.cursors.DictCursor)
     
    try:
      
     
        with connection.cursor() as cursor:
           
            # SQL 
            sql = "SELECT * FROM reviews where id="+id
             
            # Execute query.
            cursor.execute(sql)

            
            for row in cursor:
                rwstring.append(row['reviews'])
                 
    finally:
        # Close connection.
        connection.close()
    pre=''
    #import speech_recognition as sr
    #from win32com.client import Dispatch
    counter = 1
    croppedResponse = ' '
    #speak = Dispatch("SAPI.SpVoice")
    #r = sr.Recognizer()
    path='chat.txt'
    from nltk.stem.lancaster import LancasterStemmer
    stemmer = LancasterStemmer()
    from movies_review import training_data
    corpus_words = {}
    class_words = {}
    classes = list(set([a['class'] for a in training_data]))
    for c in classes:
        class_words[c] = []
    for data in training_data:
        for word in nltk.word_tokenize(data['sentence']):
            if word not in ["?", "'s"]:
                stemmed_word = stemmer.stem(word.lower())
                if stemmed_word not in corpus_words:
                    corpus_words[stemmed_word] = 1
                else:
                    corpus_words[stemmed_word] += 1
                class_words[data['class']].extend([stemmed_word])


    def calculate_class_score(sentence, class_name, show_details=True):
        score = 0
        for word in nltk.word_tokenize(sentence):
            if stemmer.stem(word.lower()) in class_words[class_name]:
                score += (1 / corpus_words[stemmer.stem(word.lower())])
        return score 
    def classify(sentence):
        high_class = None
        high_score = 0
        for c in class_words.keys():
            score = calculate_class_score(sentence, c, show_details=False)
            if score > high_score:
                high_class = c
                high_score = score

        return high_class, high_score
    mod_predict={}
    mod_predict["negitive"]=0
    mod_predict["positive"]=0
    count_neg = 0
    count_pos = 0
    
    for i in rwstring:
        sentence=i
        if(pre!=sentence):
            answer,prob=classify(sentence)
            
            if answer == "negitive":
                count_neg=count_neg+1
                mod_predict["negitive"] = count_neg
            else:
                count_pos=count_pos+1
                mod_predict["positive"] = count_pos
            pre=sentence
    return(round((mod_predict["negitive"]/(mod_predict["negitive"]+mod_predict["positive"]))*5,2))       
        
