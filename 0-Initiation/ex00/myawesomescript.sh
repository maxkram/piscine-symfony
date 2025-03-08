#!/bin/sh

# Check if a bit.ly URL is provided as an argument
if [ -z "$1" ]; then
  echo "Usage: $0 <bit.ly URL>"
  exit 1
fi

# Use curl to fetch the headers of the bit.ly URL
# Use grep to extract the "Location" header, which contains the original URL
# Use cut to isolate the URL from the header
original_url=$(curl -sI "$1" | grep -i "Location:" | cut -d' ' -f2 | tr -d '\r')

# Check if the original URL was found
if [ -z "$original_url" ]; then
  echo "Error: Could not resolve the bit.ly URL."
  exit 1
fi

# Output the original URL
echo "$original_url"