cd front && \
docker build . -t news-front && \
docker run -it -p 3000:3000 news-front
