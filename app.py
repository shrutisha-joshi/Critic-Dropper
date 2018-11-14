import movie_main
from flask import Flask, request
from flask_restful import Resource, Api

app = Flask(__name__)
api = Api(app)
 
class sumNumbers(Resource):
    def get(self,id):
        return {'data': movie_main.sentiment(id)}

api.add_resource(sumNumbers, '/movie_main/<id>')

if __name__ == '__main__':
     app.run()
