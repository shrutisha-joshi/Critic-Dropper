import sklearn
from sklearn.datasets import load_files
from sklearn.feature_extraction.text import CountVectorizer
import nltk
from sklearn.feature_extraction.text import TfidfTransformer
from sklearn.naive_bayes import MultinomialNB
from sklearn.model_selection import train_test_split
from sklearn.metrics import confusion_matrix
def sentiment():
    moviedir = r'C:\Users\WELCOME\Desktop\CSE\Internet and Web Programming\IWP Project\movie_reviews'
    # loading all files as training data. 
    movie_train = load_files(moviedir, shuffle=True)
    len(movie_train.data)
    # target names ("classes") are automatically generated from subfolder names
    movie_train.target_names
    # First file seems to be about a Schwarzenegger movie. 
    movie_train.data[0][:500]
    # first file is in "neg" folder
    movie_train.filenames[0]
    # first file is a negative review and is mapped to 0 index 'neg' in target_names
    movie_train.target[0]
    # import CountVectoriz
    sents = ['A rose is a rose is a rose is a rose.',
             'Oh, what a fine day it is.',
            "It ain't over till it's over, I tell you!!"]
    foovec = CountVectorizer(min_df=1, tokenizer=nltk.word_tokenize)
    # sents turned into sparse vector of word frequency counts
    sents_counts = foovec.fit_transform(sents)
    # foovec now contains vocab dictionary which maps unique words to indexes
    foovec.vocabulary_
    sents_counts.shape
    sents_counts.toarray()

    tfidf_transformer = TfidfTransformer()
    sents_tfidf = tfidf_transformer.fit_transform(sents_counts)
    sents_tfidf.toarray()
    # initialize movie_vector object, and then turn movie train data into a vector 
    movie_vec = CountVectorizer(min_df=2, tokenizer=nltk.word_tokenize)         # use all 25K words. 82.2% acc.
    # movie_vec = CountVectorizer(min_df=2, tokenizer=nltk.word_tokenize, max_features = 3000) # use top 3000 words only. 78.5% acc.
    movie_counts = movie_vec.fit_transform(movie_train.data)
    movie_vec.vocabulary_.get('screen')
    movie_vec.vocabulary_.get('screen')
    movie_vec.vocabulary_.get('seagal')
    movie_counts.shape
    tfidf_transformer = TfidfTransformer()
    movie_tfidf = tfidf_transformer.fit_transform(movie_counts)
    movie_tfidf.shape

    docs_train, docs_test, y_train, y_test = train_test_split(
        movie_tfidf, movie_train.target, test_size = 0.20, random_state = 12)
    clf = MultinomialNB().fit(docs_train, y_train)
    y_pred = clf.predict(docs_test)
    sklearn.metrics.accuracy_score(y_test, y_pred)

    cm = confusion_matrix(y_test, y_pred)
    cm
    reviews_new = ['This movie was excellent', 'Absolute joy ride', 
                'I loved this movie', 'Best movie I have ever scene!']
    reviews_new_counts = movie_vec.transform(reviews_new)
    reviews_new_tfidf = tfidf_transformer.transform(reviews_new_counts)
    pred = clf.predict(reviews_new_tfidf)
    mod_predict={}
    count_neg = 0
    count_pos = 0
    for review, category in zip(reviews_new, pred):
        pred = movie_train.target_names[category]
        if pred == "neg":
            count_neg=count_neg+1
            mod_predict["neg"] = count_neg
        else:
            count_pos=count_pos+1
            mod_predict["pos"] = count_pos

    return((mod_predict["pos"]/(mod_predict["neg"]+mod_predict["pos"]))*5)
    
print(sentiment())
