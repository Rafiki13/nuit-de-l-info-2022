using UnityEngine;

namespace NDIGame
{

    public class GameManager : Singleton<GameManager>
    {

        [SerializeField] private Path[] paths;
        [SerializeField] private int path;

        public Path Current => paths[path];

        public Waypoint SpawnPoint => paths[path][0];

    }

}