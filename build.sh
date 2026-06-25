#!/bin/bash
# CSS 压缩合并脚本
# 使用方法: ./build.sh

cd "$(dirname "$0")"

echo "Building CSS..."
cat assets/css/style.css assets/css/tags.css | csso -o assets/css/horizon.min.css

echo "Done! Output: assets/css/horizon.min.css"
wc -c assets/css/style.css assets/css/tags.css assets/css/horizon.min.css
