__author__ = 'Jenusdy'

try:
    import json
except ImportError:
    import simplejson as json
import tweepy, sys
from time import sleep
from textblob import TextBlob
import MySQLdb

consumer_key = 'your_consumer_key'
consumer_secret = 'your_consumer_secret'
access_token = 'your_access_token'
access_token_secret = 'your_access_token_secret'

try:
    auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
    auth.set_access_token(access_token, access_token_secret)
    api = tweepy.API(auth)

    box = [-180, -90, 180, 90]

    db = MySQLdb.connect(host="localhost",
                         user="root",
                         passwd="",
                         db="sig_sentiment")

    cur = db.cursor()
except Exception as e:
    print (e)



class MyStreamListener(tweepy.StreamListener):
    def __init__(self, api=None):
        super(MyStreamListener, self).__init__()
        self.counter = 0

    def on_status(self, status):
        record = {'Nama : ': status.user.name.encode("utf-8"), 'Text': status.text.encode("utf-8"), 'Coordinates': status.coordinates, 'Created At': status.created_at}
        self.counter += 1
        if self.counter <= 5000:
            if status.coordinates is not None:
                print (record)
                blob = TextBlob(status.text)
                if blob.sentiment.polarity < 0:
                    # Negatif
                    print (blob.sentiment.polarity)
                elif blob.sentiment.polarity == 0:
                    # Neutral
                    print (blob.sentiment.polarity)
                else:                                  
                    # Positif
                    print (blob.sentiment.polarity)

                try:
                    sql = "INSERT INTO `crawling_tweet` (`name`, `text`, `coordinate_x`, `coordinate_y`, `create_at`, `polarity`) VALUES (%s, %s, %s, %s, %s, %s)"
                    cur.execute(sql, (status.user.name.encode("utf-8"), status.text.encode('utf-8'), status.coordinates['coordinates'][0], status.coordinates['coordinates'][1], status.created_at, blob.sentiment.polarity))
                    db.commit()
                except Exception as e:
                    print(e)
                print ("x : ", status.coordinates['coordinates'][0], " y : ", status.coordinates['coordinates'][1])
            return True
        else:
            return False

    def on_error(self, status_code):
        if status_code == 420:
            return False


if __name__ == '__main__':
    myStreamListener = MyStreamListener()
    myStream = tweepy.Stream(api.auth, listener=myStreamListener)
    myStream.filter(locations=box, async=True)
    print (myStream)
