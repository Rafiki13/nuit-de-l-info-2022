using UnityEngine;

namespace NDIGame
{

    public class GameManager : Singleton<GameManager>
    {

        [SerializeField] private Path[] paths;
        [SerializeField] private int path;

        public Path Current => paths[path];

        public Vector2 SpawnPoint => paths[path][0].Position;

    }

}