# Use the Node.js LTS version as the base image
FROM node:lts

# Set the working directory in the container
WORKDIR /usr/src/app

# Copy package.json and package-lock.json files
COPY ./socket/package*.json ./

# Install dependencies
RUN npm install

# Copy application source code
COPY ./socket .

# Expose the port the app runs on
EXPOSE 3000

# Start the application
CMD ["npm", "start"]